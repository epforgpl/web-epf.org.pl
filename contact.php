<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<section class="contact">
<div class="section-head">
	<iframe width="425" height="285" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.openstreetmap.org/export/embed.html?bbox=21.0082,52.2286,21.0209,52.2305&layer=hot&zoom=8&marker=52.22925,21.01446"></iframe>
	<div class="container">
		<?php the_breadcrumb(); ?>
		<h1 class="section-headline"><?php the_title(); ?></h1>
	</div>
</div>

<div class="contact-body">
	<div class="row">
		<div class="container">
			<div class="col-md-6">
				<h3>Biuro i adres <br>
				korespondencyjny</h3>
				<?php the_field('adres'); ?>
			</div>
			<div class="col-md-6">
				<h3><br>Dane urzędowe</h3>
				<?php the_field('dane'); ?>
			</div>
		</div>
	</div>
	<div class="row newsletter">
		<div class="container">
			<div class="col-md-12">
				<h3>Chcesz być na bierząco z działalnością fundacji?<br>
				Zapisz się na newsletter!</h3>
				<?php the_field('madmini'); ?>
				
				<script type="text/javascript">
				  (function(e){function t(e){if(!e||e.nodeName!=="FORM"){return}var t,n,r=[];for(t=e.elements.length-1;t>=0;t=t-1){if(e.elements[t].name===""){continue}switch(e.elements[t].nodeName){case"INPUT":switch(e.elements[t].type){case"text":case"hidden":case"password":case"button":case"reset":case"submit":r.push(e.elements[t].name+"="+encodeURIComponent(e.elements[t].value));break;case"checkbox":case"radio":if(e.elements[t].checked){r.push(e.elements[t].name+"="+encodeURIComponent(e.elements[t].value))}break;case"file":break}break;case"TEXTAREA":r.push(e.elements[t].name+"="+encodeURIComponent(e.elements[t].value));break;case"SELECT":switch(e.elements[t].type){case"select-one":r.push(e.elements[t].name+"="+encodeURIComponent(e.elements[t].value));break;case"select-multiple":for(n=e.elements[t].options.length-1;n>=0;n=n-1){if(e.elements[t].options[n].selected){r.push(e.elements[t].name+"="+encodeURIComponent(e.elements[t].options[n].value))}}break}break;case"BUTTON":switch(e.elements[t].type){case"reset":case"submit":case"button":r.push(e.elements[t].name+"="+encodeURIComponent(e.elements[t].value));break}break}}return r.join("&")}function n(e,t){for(var n in t){e[n]=t[n]}}if(!r)var r={};if(!r.Signups)r.Signups={};r.Signups.EmbedValidation=function(){this.initialize();if(document.addEventListener){this.form.addEventListener("submit",this.onFormSubmit.bind(this))}else{this.form.attachEvent("onsubmit",this.onFormSubmit.bind(this))}};n(r.Signups.EmbedValidation.prototype,{initialize:function(){this.form=document.getElementById("mad_mimi_signup_form");this.submit=document.getElementById("webform_submit_button");this.callbackName="jsonp_callback_"+Math.round(1e5*Math.random())},onFormSubmit:function(e){e.preventDefault();this.validate();if(this.isValid){this.submitForm()}else{this.revalidateOnChange()}},validate:function(){this.isValid=true;this.emailValidation();this.fieldAndListValidation();this.updateFormAfterValidation()},emailValidation:function(){var e=document.getElementById("signup_email"),t=/.+@.+\..+/;if(!t.test(e.value)){this.textFieldError(e);this.isValid=false}else{this.removeTextFieldError(e)}},fieldAndListValidation:function(){var e=this.form.querySelectorAll(".mimi_field.required");for(var t=0;t<e.length;++t){var n=e[t],r=this.fieldType(n);if(r=="checkboxes"||r=="radio_buttons"){this.checkboxAndRadioValidation(n)}else{this.textAndDropdownValidation(n,r)}}},fieldType:function(e){var t=e.querySelectorAll(".field_type");if(t.length>0){return t[0].getAttribute("data-field-type")}else if(e.className.indexOf("checkgroup")>=0){return"checkboxes"}else{return"text_field"}},checkboxAndRadioValidation:function(e){var t=e.getElementsByTagName("input"),n=false;for(var r=0;r<t.length;++r){var i=t[r];if((i.type=="checkbox"||i.type=="radio")&&i.checked)n=true}if(n){e.className=e.className.replace(/ invalid/g,"")}else{if(e.className.indexOf("invalid")==-1)e.className+=" invalid";this.isValid=false}},textAndDropdownValidation:function(e,t){var n=e.getElementsByTagName("input");for(var r=0;r<n.length;++r){var i=n[r];if(i.name.indexOf("signup")>=0){if(t=="text_field"){this.textValidation(i)}else{this.dropdownValidation(e,i)}}}this.htmlEmbedDropdownValidation(e)},textValidation:function(e){if(e.id=="signup_email")return;var t=e.value;if(t==""){this.textFieldError(e);this.isValid=false}else{this.removeTextFieldError(e)}},dropdownValidation:function(e,t){var n=t.value;if(n==""){if(e.className.indexOf("invalid")==-1)e.className+=" invalid";this.onSelectCallback(t);this.isValid=false}else{e.className=e.className.replace(/ invalid/g,"")}},htmlEmbedDropdownValidation:function(e){var t=e.querySelectorAll(".mimi_html_dropdown");for(var n=0;n<t.length;++n){var r=t[n],i=r.value;if(i==""){if(e.className.indexOf("invalid")==-1)e.className+=" invalid";this.isValid=false;r.onchange=this.validate.bind(this)}else{e.className=e.className.replace(/ invalid/g,"")}}},textFieldError:function(e){e.className="required invalid";e.placeholder=e.getAttribute("data-required-field")},removeTextFieldError:function(e){e.className="required";e.placeholder=""},onSelectCallback:function(e){if(typeof Widget=="undefined"||Widget.BasicDropdown==undefined)return;var t=e.parentNode,n=Widget.BasicDropdown.instances;for(var r=0;r<n.length;++r){var i=n[r];if(i.wrapperEl==t){i.onSelect=this.validate.bind(this)}}},updateFormAfterValidation:function(){this.form.className=this.setFormClassName();this.submit.value=this.submitButtonText();this.submit.disabled=!this.isValid;this.submit.className=this.isValid?"submit":"disabled"},setFormClassName:function(){var e=this.form.className;if(this.isValid){return e.replace(/\s?mimi_invalid/,"")}else{if(e.indexOf("mimi_invalid")==-1){return e+=" mimi_invalid"}else{return e}}},submitButtonText:function(){var e=document.querySelectorAll(".invalid"),t;if(this.isValid||e==undefined){t=this.submit.getAttribute("data-default-text")}else{if(e.length>1||e[0].className.indexOf("checkgroup")==-1){t=this.submit.getAttribute("data-invalid-text")}else{t=this.submit.getAttribute("data-choose-list")}}return t},submitForm:function(){this.formSubmitting();var e=this;window[this.callbackName]=function(n){delete window[this.callbackName];document.body.removeChild(t);e.onSubmitCallback(n)};var t=document.createElement("script");t.src=this.formUrl("json");document.body.appendChild(t)},formUrl:function(e){var n=this.form.action,r=n.indexOf("?")>=0?"&":"?";if(e=="json")n+=".json";return n+r+"callback="+this.callbackName+"&"+t(this.form)},formSubmitting:function(){this.form.className+=" mimi_submitting";this.submit.value=this.submit.getAttribute("data-submitting-text");this.submit.disabled=true;this.submit.className="disabled"},onSubmitCallback:function(e){if(e.success){this.onSubmitSuccess(e.result)}else{top.location.href=this.formUrl("html")}},onSubmitSuccess:function(e){if(e.has_redirect){top.location.href=e.redirect}else if(e.single_opt_in||e.confirmation_html==null){this.disableForm();this.updateSubmitButtonText(this.submit.getAttribute("data-thanks"))}else{this.showConfirmationText(e.confirmation_html)}},showConfirmationText:function(e){var t=this.form.querySelectorAll(".mimi_field");for(var n=0;n<t.length;++n){t[n].style["display"]="none"}(this.form.querySelectorAll("fieldset")[0]||this.form).innerHTML=e},disableForm:function(){var e=this.form.elements;for(var t=0;t<e.length;++t){e[t].disabled=true}},updateSubmitButtonText:function(e){this.submit.value=e},revalidateOnChange:function(){var e=this.form.querySelectorAll(".mimi_field.required");for(var t=0;t<e.length;++t){var n=e[t].getElementsByTagName("input");for(var r=0;r<n.length;++r){n[r].onchange=this.validate.bind(this)}}}});if(document.addEventListener){document.addEventListener("DOMContentLoaded",new r.Signups.EmbedValidation)}else{window.attachEvent("onload",function(){new r.Signups.EmbedValidation})}})(this)
				</script>
				
				<?php /*
        <script type="text/javascript">
  (function(global) {
    function serialize(form){
      if(!form||form.nodeName!=="FORM"){
        return }
      var i,j,q=[];for(i=form.elements.length-1;i>=0;i=i-1){
        if(form.elements[i].name===""){
          continue}
        switch(form.elements[i].nodeName){
          case"INPUT":switch(form.elements[i].type){
          case"text":case"hidden":case"password":case"button":case"reset":case"submit":q.push(form.elements[i].name+"="+encodeURIComponent(form.elements[i].value));
            break;
          case"checkbox":case"radio":if(form.elements[i].checked){
            q.push(form.elements[i].name+"="+encodeURIComponent(form.elements[i].value))}
            break;
          case"file":break}
        break;
        case"TEXTAREA":q.push(form.elements[i].name+"="+encodeURIComponent(form.elements[i].value));
        break;
        case"SELECT":switch(form.elements[i].type){
          case"select-one":q.push(form.elements[i].name+"="+encodeURIComponent(form.elements[i].value));
            break;
          case"select-multiple":for(j=form.elements[i].options.length-1;j>=0;j=j-1){
            if(form.elements[i].options[j].selected){
              q.push(form.elements[i].name+"="+encodeURIComponent(form.elements[i].options[j].value))}
          }
            break}
        break;
        case"BUTTON":switch(form.elements[i].type){
        case"reset":case"submit":case"button":q.push(form.elements[i].name+"="+encodeURIComponent(form.elements[i].value));
        break}
      break}
  }
   return q.join("&")}
    ;


  function extend(destination, source) {
    for (var prop in source) {
      destination[prop] = source[prop];
    }
  }

  if(!Mimi) var Mimi = {
  }
      ;
  if(!Mimi.Signups) Mimi.Signups = {
  }
    ;

  Mimi.Signups.EmbedValidation = function() {
    this.initialize();

    if(document.addEventListener) {
      this.form.addEventListener('submit', this.onFormSubmit.bind(this));
    }
    else {
      this.form.attachEvent('onsubmit', this.onFormSubmit.bind(this));
    }
  }
    ;

  extend(Mimi.Signups.EmbedValidation.prototype, {
    initialize: function() {
      this.form         = document.getElementById('mad_mimi_signup_form');
      this.submit       = document.getElementById('webform_submit_button');
      this.callbackName = 'jsonp_callback_' + Math.round(100000 * Math.random());
    }
    ,

    onFormSubmit: function(e) {
      e.preventDefault();

      this.validate();
      if(this.isValid) {
        this.submitForm();
      }
      else {
        this.revalidateOnChange();
      }
    }
    ,

    validate: function() {
      this.isValid = true;
      this.emailValidation();
      this.fieldAndListValidation();
      this.updateFormAfterValidation();
    }
    ,

    emailValidation: function() {
      var email      = document.getElementById('signup_email'),
          validEmail = /.+@.+\..+/;

      if(!validEmail.test(email.value)) {
        this.textFieldError(email);
        this.isValid = false;
      }
      else {
        this.removeTextFieldError(email);
      }
    }
    ,

    fieldAndListValidation: function() {
      var fields = this.form.querySelectorAll('.mimi_field.required');

      for(var i = 0; i < fields.length; ++i) {
        var field = fields[i],
            type  = this.fieldType(field);
        if(type == 'checkboxes' || type == 'radio_buttons') {
          this.checkboxAndRadioValidation(field);
        }
        else {
          this.textAndDropdownValidation(field, type);
        }
      }
    }
    ,

    fieldType: function(field) {
      var type = field.querySelectorAll('.field_type');

      if(type.length > 0) {
        return type[0].getAttribute('data-field-type');
      }
      else if(field.className.indexOf('checkgroup') >= 0) {
        return 'checkboxes';
      }
      else {
        return 'text_field';
      }
    }
    ,

    checkboxAndRadioValidation: function(field) {
      var inputs   = field.getElementsByTagName('input'),
          selected = false;

      for(var i = 0; i < inputs.length; ++i) {
        var input = inputs[i];
        if((input.type == 'checkbox' || input.type == 'radio') && input.checked) selected = true;
      }

      if(selected) {
        field.className = field.className.replace(/ invalid/g, '');
      }
      else {
        if(field.className.indexOf('invalid') == -1) field.className += ' invalid';
        this.isValid = false;
      }
    }
    ,

    textAndDropdownValidation: function(field, type) {
      var inputs = field.getElementsByTagName('input');

      for(var i = 0; i < inputs.length; ++i) {
        var input = inputs[i];
        if(input.name.indexOf('signup') >= 0) {
          if(type == 'text_field') {
            this.textValidation(input);
          }
          else {
            this.dropdownValidation(field, input);
          }
        }
      }
      this.htmlEmbedDropdownValidation(field);
    }
    ,

    textValidation: function(input) {
      if(input.id == 'signup_email') return;

      var val = input.value;
      if(val == '') {
        this.textFieldError(input);
        this.isValid = false;
      }
      else {
        this.removeTextFieldError(input)
      }
    }
    ,

    dropdownValidation: function(field, input) {
      var val = input.value;
      if(val == '') {
        if(field.className.indexOf('invalid') == -1) field.className += ' invalid';
        this.onSelectCallback(input);
        this.isValid = false;
      }
      else {
        field.className = field.className.replace(/ invalid/g, '');
      }
    }
    ,

    htmlEmbedDropdownValidation: function(field) {
      var dropdowns = field.querySelectorAll('.mimi_html_dropdown');

      for(var i = 0; i < dropdowns.length; ++i) {
        var dropdown = dropdowns[i],
            val      = dropdown.value;
        if(val == '') {
          if(field.className.indexOf('invalid') == -1) field.className += ' invalid';
          this.isValid = false;
          dropdown.onchange = this.validate.bind(this);
        }
        else {
          field.className = field.className.replace(/ invalid/g, '');
        }
      }
    }
    ,

    textFieldError: function(input) {
      input.className   = 'required invalid';
      input.placeholder = input.getAttribute('data-required-field');
    }
    ,

    removeTextFieldError: function(input) {
      input.className   = 'required';
      input.placeholder = '';
    }
    ,

    onSelectCallback: function(input) {
      if(typeof Widget == 'undefined' ||
         Widget.BasicDropdown == undefined) return;

      var dropdownEl = input.parentNode,
          instances  = Widget.BasicDropdown.instances;

      for(var i = 0; i < instances.length; ++i) {
        var instance = instances[i];
        if(instance.wrapperEl == dropdownEl) {
          instance.onSelect = this.validate.bind(this);
        }
      }
    }
    ,

    updateFormAfterValidation: function() {
      this.form.className   = this.setFormClassName();
      this.submit.value     = this.submitButtonText();
      this.submit.disabled  = !this.isValid;
      this.submit.className = this.isValid ? 'submit' : 'disabled';
    }
    ,

    setFormClassName: function() {
      var name = this.form.className;

      if(this.isValid) {
        return name.replace(/\s?mimi_invalid/, '');
      }
      else {
        if(name.indexOf('mimi_invalid') == -1) {
          return name += ' mimi_invalid';
        }
        else {
          return name;
        }
      }
    }
    ,

    submitButtonText: function() {
      var invalidFields = document.querySelectorAll('.invalid'),
          text;

      if(this.isValid || invalidFields == undefined) {
        text = this.submit.getAttribute('data-default-text');
      }
      else {
        if(invalidFields.length > 1 || invalidFields[0].className.indexOf('checkgroup') == -1) {
          text = this.submit.getAttribute('data-invalid-text');
        }
        else {
          text = this.submit.getAttribute('data-choose-list');
        }
      }
      return text;
    }
    ,

    submitForm: function() {
      this.formSubmitting();

      var _this = this;
      window[this.callbackName] = function(response) {
        delete window[this.callbackName];
        document.body.removeChild(script);
        _this.onSubmitCallback(response);
      }
        ;

      var script = document.createElement('script');
      script.src = this.formUrl('json');
      document.body.appendChild(script);
    }
    ,

    formUrl: function(format) {
      var action  = this.form.action,
          divider = action.indexOf('?') >= 0 ? '&' : '?';

      if(format == 'json') action += '.json';

      return action + divider + 'callback=' + this.callbackName + '&' + serialize(this.form);
    }
    ,

    formSubmitting: function() {
      this.form.className += ' mimi_submitting';
      this.submit.value = this.submit.getAttribute('data-submitting-text');
      this.submit.disabled = true;
      this.submit.className = 'disabled';
    }
    ,

    onSubmitCallback: function(response) {
      if(response.success) {
        this.onSubmitSuccess(response.result);
      }
      else {
        top.location.href = this.formUrl('html');
      }
    }
    ,

    onSubmitSuccess: function(result) {
      if(result.has_redirect) {
        top.location.href = result.redirect;
      }
      else if(result.single_opt_in || result.confirmation_html == null) {
        this.disableForm();
        this.updateSubmitButtonText(this.submit.getAttribute('data-thanks'));
      }
      else {
        this.showConfirmationText(result.confirmation_html);
      }
    }
    ,

    showConfirmationText: function(html) {
      var fields = this.form.querySelectorAll('.mimi_field');

      for(var i = 0; i < fields.length; ++i) {
        fields[i].style['display'] = 'none';
      }

      (this.form.querySelectorAll('fieldset')[0] || this.form).innerHTML = html;
    }
    ,

    disableForm: function() {
      var elements = this.form.elements;
      for(var i = 0; i < elements.length; ++i) {
        elements[i].disabled = true;
      }
    }
    ,

    updateSubmitButtonText: function(text) {
      this.submit.value = text;
    }
    ,

    revalidateOnChange: function() {
      var fields = this.form.querySelectorAll(".mimi_field.required");

      for(var i = 0; i < fields.length; ++i) {
        var inputs = fields[i].getElementsByTagName('input');
        for(var j = 0; j < inputs.length; ++j) {
          inputs[j].onchange = this.validate.bind(this);
        }
      }
    }
  }
        );

  if (document.addEventListener) {
    document.addEventListener("DOMContentLoaded",
                              new Mimi.Signups.EmbedValidation);
  }
  else {
    window.attachEvent('onload', function() {
      new Mimi.Signups.EmbedValidation();
    }
                      );
  }
  }
    )(this);
</script>
        */ ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container">
			<div class="col-md-12">
				<h3>Popierasz pracę Fundacji? Chcesz nam pomóc?<br>
				Możesz wesprzeć naszą działalność dotacją.</h3>
				<p>Numer konta: <br>
				<?php the_field('konto'); ?> </p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container">
			<div class="col-md-12">
				<h3>Logo Fundacji</h3>
				<?php while ( have_rows('logo') ) : the_row(); ?>
					<a class="file col-md-3" href="<?php the_sub_field('file'); ?>" target="_blank">
						<img class="icon-logo" src="<?php echo get_template_directory_uri(); ?>/images/icon-logo.png"><br>
						<?php the_sub_field('title'); ?>
					</a>
				<?php endwhile;?>
			</div>
		</div>
	</div>
</div>
</section>


<?php get_footer(); ?>