<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="{{ asset('mix/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('mix/css/uikit.css') }}">

    <script src="//cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ace.js"></script>
</head>

<body>
    <div class="uk-section-primary uk-preserve-color">

        <div uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent uk-light; top: 200">
            <nav class="uk-navbar-container uk-padding uk-padding-remove-vertical" uk-navbar>
                <div class="uk-navbar-left">            
                    <a class="uk-navbar-item uk-logo" href="#">
                        <span class="uk-icon" uk-icon="icon: file-edit"></span>
                        LiveNote
                    </a>
                </div>

                <div class="uk-navbar-right">
            
                    <ul class="uk-navbar-nav">
                        <li>
                            <button class="uk-button uk-button-default" type="button" uk-toggle="target: #offcanvas-nav">
                                <i class="uk-icon" uk-icon="icon: menu"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        
        <div class="uk-container">
            <div class="uk-section uk-section-primary uk-cover-container uk-padding-remove-top" uk-height-viewport>
                <div class="uk-container uk-container-small uk-margin">
                    @yield('content')
                </div>
            </div>    
        </div>
    </div>

    <div id="offcanvas-nav" uk-offcanvas="overlay: true ;flip: true;">
        <div class="uk-offcanvas-bar">

            <ul class="uk-nav uk-nav-default">
                <li class="uk-nav-header">Notes</li>
                <li class="uk-parent">
                    <ul class="uk-nav-sub">
                        <li>
                            <a href="#" class="uk-button uk-button-default" uk-tooltip="See your notes">
                                <i class="uk-icon" uk-icon="icon: album"></i>
                                Notes
                            </a>
                        </li>
                        <li>
                            <a href="#" class="uk-button uk-button-default uk-margin-top" uk-tooltip="See your bookmarks">
                                <i class="uk-icon" uk-icon="icon: heart"></i>
                                Bookmarks
                            </a>
                        </li>
                        <li>
                            <form action="javascript:void(0)" class="uk-margin-top uk-flex uk-flex-between uk-width-1-1">
                                <input class="uk-input uk-form-width-small uk-width-1-1" type="text" placeholder="New note" uk-tooltip="Insert the note name">
                                <button class="uk-button uk-button-default" uk-tooltip="Create new note">
                                    <i class="uk-icon" uk-icon="icon: plus"></i>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                <li class="uk-nav-divider"></li>
                
                <li class="uk-nav-header">John Doe</li>
                <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: user"></span> Account</a></li>
                <li class="uk-nav-divider"></li>
                <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: link"></span> API</a></li>
                <li class="uk-nav-divider"></li>
                <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: sign-out"></span> Logout</a></li>
                <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: sign-in"></span> Register</a></li>
                <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: lock"></span> Login</a></li>
            </ul>

        </div>
    </div>
    

    <!-- All JavaScript -->
    <script src="{{ asset('mix/js/all.js') }}"></script>

    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
            ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async></script>
    <script>
        window.editor               = ace.edit("editor");        
        window.default_font_size    = 15;
        window.editor.setTheme("ace/theme/monokai");
        window.editor.getSession().setMode("ace/mode/javascript");
        window.editor.setFontSize(window.default_font_size);
        window.editor_langs         = [
            'plain_text', 'php', 'javascript', 'sh', 'css', 'scss', 'sql'
        ];
    </script>

    <script>
        function isInt(num)
        {
            return Number.isInteger(num);
        }

        function editorSetLang(lang_mode)
        {
            // Lang list:
            // https://github.com/ajaxorg/ace/tree/master/lib/ace/mode
            var valid_lang = window.editor_langs.indexOf(lang_mode) != -1;
            if(valid_lang)
            {
                window.editor.session.setMode({
                    path: "ace/mode/" + lang_mode,
                    v: Date.now() 
                });
            }
        }

        var lang_mode               = 'javascript';
        editorSetLang(lang_mode);

        function editorUndo()
        {
            window.editor.undo();
        }

        function editorRedo()
        {
            window.editor.redo();
        }

        function resetFontSize()
        {
            window.editor.setFontSize(window.default_font_size);
        }

        function editorSetFontSize(new_font_size)
        {
            if(isInt(new_font_size))
            {
                new_font_size       = new_font_size <= 0 ? 1 : new_font_size;
                new_font_size       = new_font_size >= 70 ? 70 : new_font_size;
                window.editor.setFontSize(new_font_size);
            }
        }

        function editorIncreaseFontSize()
        {
            var font_size       = window.editor.getFontSize();
            var new_font_size   = font_size + 1;
            editorSetFontSize(new_font_size);
        }

        function editorDecreaseFontSize()
        {
            var font_size       = window.editor.getFontSize();
            var new_font_size   = font_size - 1;
            editorSetFontSize(new_font_size);
        }
    </script>
</body>

</html>
