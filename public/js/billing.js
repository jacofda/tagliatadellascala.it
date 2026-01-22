(function() {

	var mesi = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];

	$('select#translateThis option').each(function(index, el) {
		var $this = $(this);
		$this.text(mesi[index])
		// el.text(mesi[index]);
	});


	var StripeBilling = {
		init: function() {
			this.form = $('#billing-form');
			this.submitButton = this.form.find('input[type=submit]');
			var stripeKey = $('meta[name="publishable-key"]').attr("content");
			Stripe.setPublishableKey(stripeKey);

			this.bindEvents();
		},

		bindEvents: function() {
			this.form.on('submit', $.proxy(this.sendToken, this));
		},

		sendToken: function(e) {
			this.submitButton.val('Stiamo processando i tuoi dati').prop('disabled', true);
			Stripe.card.createToken(this.form, $.proxy(this.stripeResponseHandler, this));
			e.preventDefault();
		},

		stripeResponseHandler: function(status, response) {
			if (response.error) {
				var risposta = '';
				if ( response.error.message == "Could not find payment information" )
				{
					risposta = "mancano dei dati! il pagamento non è stato effetuato.";
				}
				else if ( response.error.message == "Your card number is incorrect." )
				{
					risposta = "Il numero della carta non è corretto! il pagamento non è stato effetuato.";
				}
				else if ( response.error.message == "Your card's expiration month is invalid." )
				{
					risposta = "Il mese di scadenza indicato non è corretto! il pagamento non è stato effetuato.";
				}
				else if ( response.error.message == "Your card's security code is invalid." )
				{
					risposta = "Il CCV fornito non è valido! il pagamento non è stato effetuato.";
				}
				else
				{
					risposta = response.error.message;
				}

				this.form.find('#payment-error').show().text(risposta);
				return this.submitButton.val('Riprova').prop('disabled',false);
			}

			$('<input>', {
				type: 'hidden',
				name: 'stripe-token',
				value: response.id
			}).appendTo(this.form);

			this.submitButton.val('Fatto').prop('disabled', true);
			this.form.find('#payment-error').hide();
			this.form[0].submit();
		}

	};
	StripeBilling.init()
})(jQuery);