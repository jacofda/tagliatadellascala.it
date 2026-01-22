<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Primolano">
    <meta name="description" content="Associazione Tagliata della Scala è lieta di presentarvi la settima edizione della Scala dei Sapori 2017 di Primolano e Fastro. Info bilglietti" />
    <meta property="og:site_name" content="Associazione Tagliata della Scala" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo e(url('/')); ?>" />
    <meta property="og:title" content="Associazione Tagliata della Scala | Scala dei Sapori Primolano" />
    <meta property="og:description" content="Associazione Tagliata della scala di Primolano e Scala dei Sapori promuovono eventi legati al Forte Tagliata e il Forte Delle Fontanelle" />
    <meta property="og:image" content="https://www.tagliatadellascala.it/sites/all/themes/scala/img/fb/2016/homefb.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="1230" />
    <meta property="og:image:height" content="630" />

<script type="application/ld+json">
{
   "@context":"http://schema.org",
   "@type":"Organization",
   "name":"Associazione Tagliata della Scala",
   "legalName":"Ass.Tagliata della Scala",
   "url":"<?php echo e(url('/')); ?>",
   "logo":"<?php echo e(asset('img/logo-footer.png')); ?>",
   "foundingDate":"2009",
   "founders":[
      {
         "@type":"Person",
         "name":"Denis Stefani"
      }
   ],
   "address":{
      "@type":"PostalAddress",
      "streetAddress":"Via Libertà 38",
      "addressLocality":"Primolano",
      "addressRegion":"VI",
      "postalCode":"36020",
      "addressCountry":"Italy"
   },
   "geo":{
      "@type":"GeoCoordinates",
      "latitude":"45.964940",
      "longitude":"11.707517"
   },
   "contactPoint":{
      "@type":"ContactPoint",
      "contactType":"customer support",
      "telephone":"[+393453623485]",
      "email":"associazione@tagliatadellascala.it"
   },
   "sameAs":[
      "https://www.facebook.com/associazionetagliatadellascala/",
      "https://plus.google.com/118051754894364402890/about",
      "https://www.google.com/+TagliatadellascalaItsapori"
   ]
}
</script>

<title>Tagliata della Scala Primolano Scala dei Sapori Scale Primolano</title>
<link rel="author" href="https://plus.google.com/118051754894364402890/about" />
<link rel="publisher" href="https://www.google.com/+TagliatadellascalaItsapori" />
<link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">
<link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,300,700"> 
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Dosis:300,400,700">
<link href="<?php echo e(asset('theme/css/theme.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('theme/css/override.css')); ?>" rel="stylesheet">

</head>
<body>
    <div class="page" id="top">
        
        <?php echo $__env->make('elements.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('elements.single', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <?php echo $__env->make('elements.next-event', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('elements.contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('elements.carousel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('elements.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
    <script src="<?php echo e(asset('theme/all.min.js')); ?>"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/welcome.blade.php ENDPATH**/ ?>