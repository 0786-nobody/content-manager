<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />
    <style>
        body {
            margin: 5em;
        }
        li {
            font-size: 18px;
            padding: 4px;
        }

        #toast-container > .toast {
            background-image: none !important;
        }

        #toast-container > .toast:before {
            position: fixed;
            font-family: FontAwesome;
            font-size: 24px;
            line-height: 18px;
            float: left;
            color: #FFF;
            padding-right: 0.5em;
            margin: auto 0.5em auto -1.5em;
        }
        #toast-container > .toast-warning:before {
            content: "\f003";
        }
        #toast-container > .toast-error:before {
            content: "\f001";
        }
        #toast-container > .toast-info:before {
            content: "\f005";
        }
        #toast-container > .toast-success:before {
            content: "\f002";
        }

    </style>

</head>
<body>
<h1>Toastr with FontAwesome Icons</h1>
<ul class="icons-ul">
    <li><i class="icon-li icon-ok"></i>Embedded icon using the &lt;i&gt; tag</li>
    <li><i class="icon-li icon-ok"></i>Doesn't work with background-image</li>
    <li><i class="icon-li icon-ok"></i>We can use the :before psuedo class</li>
    <li><i class="icon-li icon-ok"></i>Works in IE8+, FireFox 21+, Chrome 26+, Safari 5.1+, most mobile browsers</li>
    <li><i class="icon-li icon-ok"></i>See <a href="http://caniuse.com/#search=before">CanIUse.com</a> for browser support</li>
</ul>
<button class="btn btn-primary" id="tryMe">Try Me</button>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" ></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $(function() {

        function Toast(type, css, msg) {
            this.type = type;
            this.css = css;
            this.msg = 'This is positioned in the ' + msg + '. You can also style the icon any way you like.';
        }

        var toasts = [
            new Toast('error', 'toast-bottom-full-width', 'This is positioned in the bottom full width. You can also style the icon any way you like.'),
            new Toast('info', 'toast-top-full-width', 'top full width'),
            new Toast('warning', 'toast-top-left', 'This is positioned in the top left. You can also style the icon any way you like.'),
            new Toast('success', 'toast-top-right', 'top right'),
            new Toast('warning', 'toast-bottom-right', 'bottom right'),
            new Toast('error', 'toast-bottom-left', 'bottom left')
        ];

        toastr.options.positionClass = 'toast-top-full-width';
        toastr.options.extendedTimeOut = 0; //1000;
        toastr.options.timeOut = 1000;
        toastr.options.fadeOut = 250;
        toastr.options.fadeIn = 250;

        var i = 0;

        $('#tryMe').click(function () {
            $('#tryMe').prop('disabled', true);
            delayToasts();
        });

        function delayToasts() {
            if (i === toasts.length) { return; }
            var delay = i === 0 ? 0 : 2100;
            window.setTimeout(function () { showToast(); }, delay);

            // re-enable the button
            if (i === toasts.length-1) {
                window.setTimeout(function () {
                    $('#tryMe').prop('disabled', false);
                    i = 0;
                }, delay + 1000);
            }
        }

        function showToast() {
            var t = toasts[i];
            toastr.options.positionClass = t.css;
            toastr[t.type](t.msg);
            i++;
            delayToasts();
        }
    })

</script>
</body>
</html>
