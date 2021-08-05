var fn = {
    gotolink: function (url) {
        window.location = url;
    }
};


var FormOS = {
    submitDataForm: function(elementForm, routePost, idTempForm){

      dataForm = $(`${elementForm}`).serializeFormJSON();
      this.sendForm(dataForm, routePost, idTempForm);
    },
    sendForm: function(dataForm, routePost, idTempForm, method){
        const form = document.createElement('form');
        form.method = method || 'POST';
        form.action = `${routePost}`;
        form.id = `${idTempForm}`;

        _.forEach(dataForm, function(value, key) {

            if(value == "" || value == null){
                dataForm[key] = "";
            }
            const hiddenField = document.createElement('input');
            hiddenField.type = 'hidden';
            hiddenField.name = key;
            hiddenField.value = _.trim(dataForm[key]);

            form.appendChild(hiddenField);
        });
        document.body.appendChild(form);
        form.submit();
        $( `#${idTempForm}` ).remove();
    },
    submitDeleteForm: function(id, routePost, idTempForm){

        const dataForm = {
            _token:  $('meta[name="csrf-token"]').attr('content'),
            _method:  `DELETE`,
            id:  `${id}`
        };



        this.sendForm(dataForm, routePost, idTempForm);

    },
    isInvalid: function(erro, regex, inputName, isSelect2 = false){

        let nameElement = isSelect2 ? `[name="${inputName}"] + span` : `[name="${inputName}"]`;

        if(isSelect2){
           if( !$(nameElement).is(':visible') ){
               setTimeout(() => {
                 FormOS.isInvalid(erro, regex, inputName, true);
               }, 1000);
               return '';
           }

          $(`[name="${inputName}"]`).on('select2:selecting', function(e) {
            $(nameElement).removeClass('is-invalid');
            $('[data-dismiss="alert"]').trigger('click');
          });
        }

        if((m = regex.exec(erro)) !== null){
            $(nameElement).addClass("is-invalid");
        }
        $(`[name="${inputName}"]`).focus(function() {
            $(nameElement).removeClass('is-invalid');
            $('[data-dismiss="alert"]').trigger('click');

        });
    }
};

/**
 * Conta as Request ativas, sempre que uma chamada XHR é aberta
 *
 * @param {*} window.request_active
 * @returns
 */
window.request_active = 0;
(function (open) {
    return (XMLHttpRequest.prototype.open = function (method, url, async) {
        this.addEventListener("readystatechange", function () {
            if (this.readyState == 1) {
                window.request_active += 1;
            } else if (this.readyState == 4) {
                window.request_active -= 1;
            }
            try {
                showLoadPage();
            } catch (error) {

            }
        }, false);
        return open.call(this, method, url, async);
    });
})(XMLHttpRequest.prototype.open);


