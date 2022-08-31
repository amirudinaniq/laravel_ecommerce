import _ from 'lodash';
import { useLoading } from 'vue3-loading-overlay';
import 'vue3-loading-overlay/dist/vue3-loading-overlay.css';

var loader = useLoading();

export default{
    data:function(){
        return{
            intervalTime : 0,

        }
    },
    capitalize:function(str){
        console.log(str);
        if(str[str.length-1]!=" "){
            str = str.split(" ");
            for (let ind = 0; ind < str.length; ind++) {
                str[ind] = str[ind][0].toUpperCase() + str[ind].substring(1);
            }
            return str.join("");
        }
        else {
            return str.toUpperCase();
        }
    },
    removeSpace:function(str){
        //console.log("string",str);
        if(typeof(str)=='string' && str.includes("-"))
            return (str.split('-').join('')).split(' ').join('');
        if(typeof(str)=='string' && str.includes("/"))
            return (str.split('/').join('')).split(' ').join('');
        return str.split(' ').join('');
    },
    // postData:function(dest,item){
    //     console.log("post data");
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //     $.ajax({
    //         type:"POST",
    //         url:dest,
    //         data:item,
    //         success:function(response){
    //             console.log("Success:"+response);
    //         },
    //         error:function(response){
    //             console.log("Error:"+response);
    //         }
    //     })
    //
    // },
    // postData:function(dest,item){
    //     this.axios.post(dest,item).then(resp=>{
    //         console.log("success",resp);
    //     }).catch(err=>{
    //         console.log(err);
    //     })
    // },
    postData:function(dest,item){
        // window.messageError = '';
        // window.messageSuccess = '';
        dest = dest.replaceAll(/(?<=\?.*)\?/g,'&')
        return this.axios.post(dest,item).then(resp=>{
            try {
                item = Object.fromEntries(item);
            }catch (e) {}
            console.log('POST',dest,item,'\n','res =>',resp)
            let errorCallback = (data) => {
                let errorMsg = '';
                if(data.error) errorMsg += data.error+' ';
                if(data.errorMessage) errorMsg += data.errorMessage+' ';
                if(data.errors){
                    for(let i= 0; i < data.errors.length; i++){
                        errorMsg += data.errors[i]+' ';
                    }
                }

                resp.error = errorMsg;
                // window.messageError = errorMsg;
                return ["error", resp];
            }
            let successCallback = (data) => {
                let successMsg = '';
                if(data.success) successMsg += data.success+' ';
                if(data.message) successMsg += data.message+' ';
                resp.success = successMsg;
                // window.messageSuccess = successMsg;
            }

            if(resp.data.statusRes){
                let data = resp.data;
                if(data.error || data.errors){
                    return errorCallback(data);
                }else if(data.success || data.message){
                    successCallback(data);
                }
            }else{
                if(resp.data.error || resp.data.errors){
                    return errorCallback(resp.data);
                }
            }
            // window.sessionList = isset(()=>resp.data.session) ? resp.data.session : window.sessionList;
            // window.updateNotification()
            return ["success",resp];
            //return "success";
        }).catch(err=>{
            try {
                item = Object.fromEntries(item);
            }catch (e) {}
            console.log('POST',dest,item,'error =>',err)
            // this.toast(translate('labels.Somethings went wrong'))
            return "error";
        });
    },
    getData:function(source){
        // window.messageError = '';
        // window.messageSuccess = '';
        source = source.replaceAll(/(?<=\?.*)\?/g,'&')
        return this.axios.get(source).then(resp=>{
            console.log('GET', source,'\n',' res =>',resp)
            if(resp.data.statusRes){
                let data = resp.data;
                if(data.error || data.errors){
                    let errorMsg = '';
                    if(data.error) errorMsg += data.error+' ';
                    if(data.errorMessage) errorMsg += data.errorMessage+' ';
                    if(data.errors){
                        for(let i= 0; i < data.errors.length; i++){
                            errorMsg += data.errors[i]+' ';
                        }
                    }
                    resp.error = errorMsg;
                    // window.messageError = errorMsg;
                    return ["error", resp];
                }else if(data.success || data.message){
                    let successMsg = '';
                    if(data.success) successMsg += data.success+' ';
                    if(data.message) successMsg += data.message+' ';
                    resp.success = successMsg;
                    // window.messageSuccess = successMsg;
                }
            }
            // window.sessionList = isset(()=>resp.data.session) ? resp.data.session : window.sessionList;
            // window.updateNotification()
            return ["success",resp];
        }).catch(err=>{
            console.log('GET', source+' error =>',err)
            // this.toast(translate('labels.Somethings went wrong'))
            return "error";
        })
    },
    helpers:function(_function,_parameter=[]){
        return this.axios.get(url+'/helpers/'+_function+'?parameter='+_parameter).then(resp=>{
            try {
                _parameter = Object.fromEntries(_parameter);
            }catch (e) {}
            return resp.data;
        }).catch(err=>{
            try {
                _parameter = Object.fromEntries(_parameter);
            }catch (e) {}
            return "error";
        });
    },
    validateForm:function(formID = null){
        let result = true;
        let fieldValidate = document.querySelectorAll('.field-validate')
        if(formID){
            formID = '#'+formID;
            fieldValidate = document.querySelectorAll(formID+' .field-validate')
        }
        for(const validate of fieldValidate){
            if(empty(validate.value)){
                let formGroup = validate.closest('.form-group').closest('.form-group');
                formGroup.classList.add('has-error')

                document.querySelector('.has-error').scrollIntoView({behavior:'smooth',block: "end", inline: "nearest"});

                // let headerOffset = 0,
                //     elementPosition = document.querySelector('.has-error').getBoundingClientRect().top,
                //     // elementPosition = formGroup.getBoundingClientRect().top,
                //     offsetPosition = elementPosition - headerOffset;

                //     console.log(offsetPosition)
                // window.scrollTo({
                //     top: offsetPosition,
                //     behavior: "smooth"
                // });
                result = false;
            }else{
                validate.closest('.form-group').closest('.form-group').classList.remove('has-error')
            }
        }
        return result;
    },
    toast:function(message = '',type=''){
        if(message){
            let extra_class = ' ';
            if(type =='success'){
                extra_class += 'bg-success';
            }else if(in_array(type,['danger','error','fail'])){
                extra_class += 'bg-danger';
            }
            var x = document.createElement('div');
            x.className="toast-message show"+extra_class;
            x.innerHTML = message;
            x.onclick = () => {
                document.body.removeChild(x);
            }
            document.body.appendChild(x)
            setTimeout(function(){
                if(document.querySelector('.toast-message.show')){
                    document.body.removeChild(x)
                }
            },4500);
        }
    },
    transLang(string){
        let result = '';
        let prefix = ['labels','auth','website']
        for(const dat of prefix){
            if(string.includes(dat)){
                let splitted = string.split(dat+'.');
                if(isset(()=>window.trans[dat][splitted[1]])){
                    result = window.trans[dat][splitted[1]];
                }else{
                    result = string.replace(/labels\.|auth\.|website\./gi,'');
                    window.toTranslate.push(result)
                }
            }
        }
        return result ? result : string;
    },
    getTranslateTitle(prefix = 'labels.',meta = null){
        let name = prefix;
        if(meta){
            name = meta.subHeader ? meta.subHeader : meta.subTitle;
        }

        let trans=(key)=>{
            return _.get(window.trans,key,key);
        };
        let result = trans(prefix+ name)

        if(result.includes(prefix) == true){
            result = name;
        }
        return result;
    },
    parseSelect(array,value,text){
        array.forEach((dat,index)=>{
            array[index].value = dat[value];
            array[index].text = dat[text]
        });
        return array;
    },
    waitFor(variable, callback) {
        let runtime = 200;let maxruntime = 2000;let intervalTime= this.intervalTime;
        var interval = setInterval(function() {
            intervalTime = intervalTime == 0 ? runtime : intervalTime+runtime;
            if (intervalTime == maxruntime || (variable && (typeof variable == 'array' && variable.length > 0) || (typeof variable == 'object' && Object.keys(variable).length > 0) || variable != '')) {
                clearInterval(interval);
                intervalTime = 0;
                callback();
            }
        }, runtime);
    },
    parseLink(link,params){
        return link.replace('-',this.parameter(params))
    },
    parameter(param){
        if(typeof param == 'object'){
            var s = [], rbracket = /\[\]$/,
                isArray = function (obj) {
                    return Object.prototype.toString.call(obj) === '[object Array]';
                }, add = function (k, v) {
                    v = typeof v === 'function' ? v() : v === null ? '' : v === undefined ? '' : v;
                    s[s.length] = encodeURIComponent(k) + '=' + encodeURIComponent(v);
                }, buildParams = function (prefix, obj) {
                    var i, len, key;

                    if (prefix) {
                        if (isArray(obj)) {
                            for (i = 0, len = obj.length; i < len; i++) {
                                if (rbracket.test(prefix)) {
                                    add(prefix, obj[i]);
                                } else {
                                    buildParams(prefix + '[' + (typeof obj[i] === 'object' ? i : '') + ']', obj[i]);
                                }
                            }
                        } else if (obj && String(obj) === '[object Object]') {
                            for (key in obj) {
                                buildParams(prefix + '[' + key + ']', obj[key]);
                            }
                        } else {
                            add(prefix, obj);
                        }
                    } else if (isArray(obj)) {
                        for (i = 0, len = obj.length; i < len; i++) {
                            add(obj[i].name, obj[i].value);
                        }
                    } else {
                        for (key in obj) {
                            buildParams(key, obj[key]);
                        }
                    }
                    return s;
                };

            return '?'+buildParams('', param).join('&').replace(/%20/g, '+');
        }else{
            let paramString = new URLSearchParams(param);
            return '?'+paramString.toString();
        }
    },
    deleteItem(items,idProperty,selectedItemID){
        //first find the index of the object based on selected id
        let index = items.map(item => item[idProperty]).indexOf(selectedItemID)
        // remove item based on received index
        items.splice(index, 1)
        return items
    },
    asset(path) {
        var base_path = window._asset || '';
        return base_path + path;
    },
    getImage:function(source){
        console.log("SOURCE",source);
        if(source!=null){
            if(source.length!=0 && source!=undefined && typeof(source)=="string")
                return `${window.imageConfig}${source}`;
            else if(typeof(source)=="object" && !Array.isArray(source) && !source.hasOwnProperty("item"))
                return URL.createObjectURL(source);
            else
                return null;
        }
    },
    transferDataFromMain(_this,res = {}){
        let extend = _this.extend;
        for (let index = 0; index < Object.keys(extend).length; index++) {
            const key = Object.keys(extend)[index];
            if(isset(()=>_this[key])|| isset(()=>res[key])){ continue ; }
            res[key] = extend[key]
        }
        return res;
    },
    formDataAppend(name,formData){
        $(`select[name="${name}[]"] option:selected`).each(function() {
            formData.append('target_customer_group[]',$(this).val());
        });
        console.log(formData,Object.entries(formData))
        return formData;
    },
    hideMenuBar(){
        console.log('print layout')
        function applyClass(className){
            var all = document.getElementsByClassName(className);
            for (var i = 0; i < all.length; i++) {
                if(className != 'app-main__outer'){
                    all[i].style.display = 'none';
                }else{
                    all[i].style.padding = '0px';

                }
            }
        }

        applyClass('app-header')
        applyClass('app-sidebar')
        applyClass('app-main__outer')
    },

    toastvue(position, variant, title) {
        const h = this.$createElement
        const toastTitle = h(
            'div',
            { class: ['d-flex', 'flex-grow-1', 'align-items-baseline', 'mr-2'] },
            [
                h('strong', { class: 'mr-2' }, 'Notify'),
            ]
        )
        this.$bvToast.toast(title, {
            title: [toastTitle],
            variant: variant,
            solid: true,
            toaster: position
        })
    },

    showLoader:function(){
        loader.show({
            // Optional parameters
            loader : 'dots',
            color: '#fe7865',
            isFullPage : true,
            zIndex : 9999   
        });
        // simulate AJAX
        // setTimeout(() => {
        //  loader.hide()
        // },5000)  
    },

    hideLoader:function(){
        loader.hide()
    },

}
