<?php

namespace App\Libraries;

use App\Media;
use \Image;
use App\Event;
use App\Article;
use App\Tag;
use App\Sector;
use App\Gallery;
use Illuminate\Support\Str;


class MediaHelper {

    public function resizeAndSaveImage($file, $filename, $directory)
    {
		$img = Image::make( $file->getRealPath() );
        $width = $img->width();
        $height = $img->height();
        $img->backup();

        if ($width > $height)
        {
            $img->resize(1800, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save( storage_path('app/public/'.$directory.'/full/').$filename );
        }
        else
        {
            $img->resize(null, 800, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save( storage_path('app/public/'.$directory.'/full/').$filename );
        }

        $img->reset();


        $img->resize(750, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save( storage_path('app/public/'.$directory.'/display/').$filename );



        return true;
    }

    public function saveImageOrFile($request)
    {
        if ( $request->hasFile('file') )
        {
            if ( $request->file->isValid() )
            {

    			$imageExtensions = ['jpeg','gif','jpg','png','bmp'];
    			$ext = strtolower($request->file->getClientOriginalExtension());

    			$filename = $this->makeNiceName($request, $ext);

                if ( in_array($ext, $imageExtensions) )
                {
                	$request->file->storeAs('public/'.$request->directory.'/original', $filename );
                    if ( $this->resizeAndSaveImage($request->file, $filename, $request->directory) )
                    {
                        Media::create([
                            'description' => $this->makeNiceDescription($request),
                            'mime' => "image",
                            'filename' => $filename,
                            'mediable_id' => $request->mediable_id,
                            'mediable_type' => $request->mediable_type,
                        ]);
                    }
                }
                else
                {
                	$request->file->storeAs('public/'.$request->directory.'/original', $filename );
                    Media::create([
                        'description' => $request->file->getClientOriginalName(),
                        'mime' => 'doc',
                        'filename' => $filename,
                        'mediable_id' => $request->mediable_id,
                        'mediable_type' => $request->mediable_type,
                    ]);
                }
                return "done";
            }
            return 1;
        }
        return 0;
    }

    public function deleteMediaFromModel($directory, $id)
    {

    	$media = Media::find($id);

        if ($media->mime == 'image')
        {
            $folders = ['/display/','/original/','/full/'];
            foreach($folders as $folder)
            {
                if( file_exists ( storage_path('app/public/'.$directory.$folder.$media->filename) ) )
                {
                    unlink( storage_path('app/public/'.$directory.$folder.$media->filename) );
                }
            }
        }

        if( file_exists ( storage_path('app/public/'.$directory.'/original/'.$media->filename) ) )
        {
            unlink( storage_path('app/public/'.$directory.'/original/'.$media->filename) );
        }
        if( file_exists ( storage_path('app/public/'.$directory.'/'.$media->filename) ) )
        {
            unlink( storage_path('app/public/'.$directory.'/'.$media->filename) );
        }

        $media->delete();

        return 'done';
    }


    public function updateDescription($request)
    {
        Media::find($request['id'])->update(['description' => $request['description']]);
        return 'done';
    }


    public function makeNiceName($request, $ext)
    {
        if ($request->mediable_type == "App\Event")
        {
            $slug = Event::find($request->mediable_id)->slug;
            return $slug.'-'.date('Y').'-'.Str::random(4).'.'.$ext;
        }
        elseif ( $request->mediable_type == "App\Article" )
        {
            $slug = Article::find($request->mediable_id)->slug;
            return $slug.'-'.date('Y').'-'.Str::random(4).'.'.$ext;
        }
        elseif ( $request->mediable_type == "App\Tag" )
        {
            $slug = Tag::find($request->mediable_id)->slug;
            return $slug.'-'.date('Y').'-'.Str::random(4).'.'.$ext;
        }
        elseif ( $request->mediable_type == "App\Sector" )
        {
            $slug = Sector::find($request->mediable_id)->slug;
            return $slug.'-'.date('Y').'-'.Str::random(4).'.'.$ext;
        }
        elseif ( $request->mediable_type == "App\Gallery" )
        {
            $slug = Gallery::find($request->mediable_id)->slug;
            return $slug.'-'.date('Y').'-'.Str::random(4).'.'.$ext;
        }

        return Str::random(4).'.'.$ext;
    }

    public function makeNiceDescription($request)
    {
        if ($request->mediable_type == "App\Event")
        {
            $event = Event::find($request->mediable_id);
            $name = $event->name;
            $tag = $event->tags()->first()->name;

            return $name.' '. $tag .' '.date('Y');
        }
        elseif ( $request->mediable_type == "App\Article" )
        {
            $article = Article::find($request->mediable_id);
            $name = $article->name;
            $tag = $article->tags()->first()->name;

            return $name.' '. $tag .' '.date('Y');
        }
        elseif ( $request->mediable_type == "App\Tag" )
        {
            $tag = Tag::find($request->mediable_id);
            return $tag->name .' '.date('Y');
        }
        elseif ( $request->mediable_type == "App\Sector" )
        {
            $sector = Sector::find($request->mediable_id);
            return $sector->name .' '.date('Y');
        }
        elseif ( $request->mediable_type == "App\Gallery" )
        {
            $sector = Gallery::find($request->mediable_id);
            return $sector->name .' '.date('Y');
        }

        return 'todo';

    }


}
