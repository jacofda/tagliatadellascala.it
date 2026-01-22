<?php $__env->startSection('meta'); ?>
<title>Associazione Tagliata Della Scala Primolano</title>
    <meta name="keywords" content="Primolano">
    <meta name="description" content="Associazione Tagliata della scala di Primolano e Scala dei Sapori promuovono eventi legati al Forte Tagliata e il Forte Delle Fontanelle" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo e(url('associazione/chi-siamo')); ?>" />
    <meta property="og:title" content="Associazione Tagliata della Scala | Scala dei Sapori Primolano" />
    <meta property="og:description" content="Associazione Tagliata della scala di Primolano e Scala dei Sapori promuovono eventi legati al Forte Tagliata e il Forte Delle Fontanelle" />
    <meta property="og:image" content="<?php echo e(asset('img/fb/associazione-tagliata-della-scala.jpg')); ?>" />
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <section class="page-section bg-dark-alfa-70 parallax-3" data-background="<?php echo e(asset('img/chisiamo.jpg')); ?>">
        <div class="relative container align-left"> 
            <div class="row"> 
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Chi Siamo</h1>
                    <h2 class="hs-line-4 font-alt">Associazione Tagliata della Scala</h2>
                </div>
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="<?php echo e(url('/')); ?>">Home</a>&nbsp;/&nbsp;<a href="<?php echo e(url($sector->slug)); ?>"><span>La nostra associazione</span></a>
                    </div>  
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="section-text mb-50 mb-sm-20">
        <div class="row">                       
            <div class="col-md-4">
                <blockquote>
                    <p>Il nostro sodalizio organizza e gestisce mostre tematiche nel territorio, cooperando attivamente con gruppi di altri comuni.</p>
                    <footer>Denis Stefani</footer>
                </blockquote>
            </div>                            
            <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                L’associazione ha sede a Primolano nelle ex scuole elementari: uno stabile interamente ristrutturato grazie all’apporto di volontari, che oggi ospita una piccola sala espositiva dedicata alla storia locale (museo), una sala proiezione e una biblioteca. 
            </div>                            
            <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                Rivalutazione il patrimonio storico della Valbrenta e delle aree montane circostanti: l’idea è quella di <i>unire</i> le varie fortificazioni in un unico grande museo territoriale. Per questo sono state attivate sinergie con altre realtà del Vicentino, del Bellunese e del Trentino.
            </div>                            
        </div>
    </div>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/associazione.blade.php ENDPATH**/ ?>