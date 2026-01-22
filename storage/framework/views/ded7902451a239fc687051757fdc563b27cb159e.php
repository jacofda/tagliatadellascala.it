<?php $__env->startSection('meta'); ?>
<title>Acquista Biglietti</title>

    <meta name="description" content="Prenota i biglietti per gli eventi dell'associazione tagliata della scala e la scala dei sapori" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo e(url('eventi/carrello')); ?>" />
    <meta property="og:title" content="Acquista Biglietti | Tagliata della scala e Scala dei Sapori" />
    <meta property="og:description" content="Prenota i biglietti per gli eventi dell'associazione tagliata della scala e la scala dei sapori" />


<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>

	<section class="small-section bg-dark-alfa-90">
	    <div class="relative container align-left">
	        
	        <div class="row">
	            
	            <div class="col-md-8">
	                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Acquista Biglietti</h1>
	                <h2 class="hs-line-4 font-alt">Evento: <b><?php echo e($event->name); ?></b></h2>
	            </div>
	            
	            <div class="col-md-4 mt-30">
	                <div class="mod-breadcrumbs font-alt align-right">
                        <a href="<?php echo e(url('/')); ?>">Home</a>&nbsp;/&nbsp;
                        <a href="<?php echo e(url('eventi')); ?>">Eventi</a>&nbsp;/&nbsp;
                        <a href="<?php echo e($event->url); ?>"><?php echo e($event->name); ?></a>&nbsp;/&nbsp;
                        <span>Numero Biglietti</span>
	                </div>
	            </div>
	        </div>
	        
	    </div>
	</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<table class="table table-striped shopping-cart-table">
    <tr>
        <th class="hidden-xs"></th>
        <th>Nome Evento</th>
        <th>Data Evento</th>
        <th>Tipo</th>
        <th>N.Biglietti</th>
        <th>&nbsp;</th>
    </tr>
    <tr>
        <td class="hidden-xs">
            <img class="img-responsive max-80" src="<?php echo e(asset('storage/events/display/'.$event->media()->where('mime','image')->first()->filename)); ?>" alt=""/>
        </td>
        <td><a href="<?php echo e($event->url); ?>" title=""><?php echo e($event->name); ?></a></td>
        <td><?php echo e($event->start->format('d/m/Y H:i')); ?></td>
        <td>Intero <?php echo e($event->formatted_price); ?></td>
        <td>
            <div class="form">
                <?php if(session()->has('n_tickets')): ?>
                    <input id="n_tickets" type="number" class="input-sm" style="width: 60px;" min="1" max="8" value="<?php echo e(session()->get('n_tickets')); ?>" />
                <?php else: ?>
                    <input id="n_tickets" type="number" class="input-sm" style="width: 60px;" min="0" max="8" value="1" />
                <?php endif; ?>
            </div>
        </td>
        <td>
            EUR <span id="adapdedPrice"></span>
        </td>
    </tr>
    <?php if($event->price_reduced): ?>
        <tr>
            <td class="hidden-xs">
                &nbsp;
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Ridotto* <?php echo e($event->formatted_price_reduced); ?></td>
            <td>
                <div class="form">
                    <?php if(session()->has('n_tickets_reduced')): ?>
                        <input id="n_tickets_reduced" type="number" class="input-sm" style="width: 60px;" min="0" max="8" value="<?php echo e(session()->get('n_tickets_reduced')); ?>" />
                    <?php else: ?>
                        <input id="n_tickets_reduced" type="number" class="input-sm" style="width: 60px;" min="0" max="8" value="0" />
                    <?php endif; ?>
                </div>
            </td>
            <td>
                EUR <span id="adapdedPriceReduced"></span>
            </td>
        </tr>
    <?php endif; ?>
    <tr>
        <td class="hidden-xs">
            &nbsp;
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td style="text-align: right; padding-right: 30px; padding-top: 35px;">
            <b>TOTALE</b>
        </td>
        <td style="padding-top: 35px;">
            EUR <span id="totalAllTickets"></span>
        </td>    
    </tr>
</table>
<?php if($event->price_reduced): ?>
<p class="text-muted"> *Ridotto per bambini dai 6 ai 12 anni</p>
<?php endif; ?>
<hr class="mb-60" />

<div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6 text align-right pt-10">
        <div>
            <?php echo Form::open(['url' => url('eventi/pre-pagamento')]); ?>

                <input type="hidden" name="id" value=<?php echo e($event->id); ?>>
                <input type="hidden" id="n_to_form" name="n_tickets" value="">
                <input type="hidden" id="n_to_form_reduced" name="n_tickets_reduced" value="">
                <button class="btn btn-mod btn-round btn-large" type="submit">Procedi al pagamento</button>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
<?php if($event->price_reduced): ?>

    (function($){
        var price = <?php echo e($event->price); ?>;
        var price_reduced = <?php echo e($event->price_reduced); ?>;
        
        function adaptCart(price, price_reduced){
            var n_tickets = parseInt( $('input#n_tickets').val() );
            var total = ((price*n_tickets)/100).toFixed(2);
            $('span#adapdedPrice').html(total);
            $('input#n_to_form').val(n_tickets);


            var n_tickets_reduced = parseInt( $('input#n_tickets_reduced').val() );

            if( n_tickets_reduced == 0 )
            {   
                $('span#adapdedPriceReduced').html("0.00");
            }
            else
            {
                var total_reduced = ((price_reduced*n_tickets_reduced)/100).toFixed(2);
                $('span#adapdedPriceReduced').html(total_reduced);
                $('input#n_to_form_reduced').val(n_tickets_reduced);              
            }
            var allTotal = (price*n_tickets) + (price_reduced*n_tickets_reduced);
            console.log(price);
            console.log(price_reduced);
            console.log(n_tickets);
            console.log(n_tickets_reduced);
            console.log(allTotal);
            $('span#totalAllTickets').html( (allTotal/100).toFixed(2) );

        }
        adaptCart(price, price_reduced);
        $('input#n_tickets').on('change', function(){
            adaptCart(price, price_reduced);
        })
        $('input#n_tickets_reduced').on('change', function(){
            adaptCart(price, price_reduced);
        })
    })(jQuery);

<?php else: ?>

    (function($){
        var price = <?php echo e($event->price); ?>;
        function adaptCart(price){
            var n_tickets = parseInt( $('input#n_tickets').val() );
            var total = ((price*n_tickets)/100).toFixed(2);
            $('span#adapdedPrice').html(total);
            $('input#n_to_form').val(n_tickets);
            $('span#totalAllTickets').html( total );
            console.log(price);
            console.log(n_tickets);
            console.log(total);
        }
        adaptCart(price);
        $('input#n_tickets').on('change', function(){
            adaptCart(price);
        })
    })(jQuery);

<?php endif; ?>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/events/cart.blade.php ENDPATH**/ ?>