<?php
    $user = Auth::user();

    $admin = ($user && $user->is_admin);

    $nav = [
        'Play' => '/play/',
        'Shop' => '/shop/',
        'Clans' => '/clans/',
        'Users' => '/search/',
        'Forum' => '/forum/',
        'Membership' => '/membership/'
    ];

    $navLoggedIn = [
    ];

    $navAdmin = [
        'Admin' => '/admin/'
    ];

    if($user) {
        $secondaryNav = [
            'Home' => '/dashboard/',
            'Settings' => '/settings/',
            'Avatar' => '/customize/',
            'Profile' => '/user/'.$user['id'].'/',
            'Download' => '/client/',
            'Trades' => '/trades/',
            // pages being removed until added after site release
            'Invite' => '/invite/',
            'Advertise' => '/advertise/',
            'Sets' => '/sets/',
            'Currency' => '/currency/',
            'Blog' => '/blog/'
        ];

        $nav = array_merge($navLoggedIn, $nav);
    }

    if($admin) {
        $nav = array_merge($nav, $navAdmin);
        $adminCount = $user->getCount('admin');
    }

    $defaultTheme = 'dark';

    $themeList = [
        1 => 'default',
        2 => 'dark',
        3 => 'default',
        4 => 'dark'
    ];
?>

<!DOCTYPE html>
<html lang="en"
    <?php if(auth()->guard()->check()): ?>
        <?php if(array_key_exists(auth()->user()->theme, $themeList)): ?>
            class="theme-<?php echo e($themeList[auth()->user()->theme]); ?>"
        <?php endif; ?>
    <?php endif; ?>
    <?php if(auth()->guard()->guest()): ?>
        class="theme-<?php echo e($defaultTheme); ?>"
    <?php endif; ?>
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php echo $__env->yieldPushContent('meta'); ?>
    <meta name="theme-color" content="#00A9FE">
    <meta name="og:image" content="<?php echo e(asset('favicon.ico')); ?>">
    <meta name="og:site_name" content="Brick Hill">
    <meta name="og:description" content="A platform built on its community where you can customise your avatar, create and play games, or just socialise with others!">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <?php if(auth()->guard()->check()): ?>
    <meta 
        name="user-data"
        data-authenticated="true"
        data-id="<?php echo e(auth()->id()); ?>"
        data-username="<?php echo e(auth()->user()->username); ?>"
        data-membership="<?php echo e(auth()->user()->membership->membership ?? false); ?>"
        data-bucks="<?php echo e(auth()->user()->bucks); ?>"
        data-bits="<?php echo e(auth()->user()->bits); ?>"
        data-tax-rate="<?php echo e(auth()->user()->membership_limits->tax_rate); ?>"
        data-admin="<?php echo e(auth()->user()->is_admin ? "false" : "true"); ?>"
    >
    <?php endif; ?>
    <?php if(auth()->guard()->guest()): ?>
    <meta
        name="user-data"
        data-authenticated="false"
    >
    <?php endif; ?>

    <?php if (! empty(trim($__env->yieldContent('title')))): ?>
        <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(config('app.name', 'Brick Hill')); ?>mm</title>
        <meta name="og:title" content="<?php echo $__env->yieldContent('title'); ?> - <?php echo e(config('app.name', 'Brick Hill')); ?>">
    <?php else: ?>
        <title><?php echo e(config('app.name', 'Brick Hill')); ?>mm</title>
        <meta name="og:title" content="<?php echo e(config('app.name', 'Brick Hill')); ?>">
    <?php endif; ?>

    <link href="<?php echo e(asset('favicon.ico')); ?>" rel="icon">

    <?php if(auth()->guard()->check()): ?>
        <?php if(array_key_exists(auth()->user()->theme, $themeList)): ?>
        <link href="http://laravel-site.test/dist/css/eac29c85ac1a8bf422b7.css" rel="stylesheet" type="text/css">
        <?php else: ?>
        <link href="http://laravel-site.test/dist/css/eac29c85ac1a8bf422b7.css" rel="stylesheet" type="text/css">
        <?php endif; ?>
    <?php endif; ?>
    <?php if(auth()->guard()->guest()): ?>
    <link href="http://laravel-site.test/dist/css/eac29c85ac1a8bf422b7.css" rel="stylesheet" type="text/css">
    <?php endif; ?>
    <link href="http://laravel-site.test/dist/css/bb079a8c30bdb19ea147.css" rel="stylesheet" type="text/css">
 <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <?php echo $__env->yieldPushContent('css'); ?>

    <?php if(app()->environment(['prod', 'production'])): ?>
    <script type="text/javascript" async="true">
        !function(){var e=document.createElement("script"),t=document.getElementsByTagName("script")[0],
        a="https://cmp.quantcast.com".concat("/choice/","CH96B6ycUs-aM","/","www.brick-hill.com","/choice.js?tag_version=V2"),
        s=0;e.async=!0,e.type="text/javascript",e.src=a,t.parentNode.insertBefore(e,t),
        !function e(){for(var t,a="__tcfapiLocator",s=[],i=window;i;){try{if(i.frames[a]){t=i;break}}catch(n){}if(i===window.top)break;
        i=i.parent}t||(!function e(){var t=i.document,s=!!i.frames[a];if(!s){if(t.body){var n=t.createElement("iframe");
        n.style.cssText="display:none",n.name=a,t.body.appendChild(n)}else setTimeout(e,5)}return!s}(),
        i.__tcfapi=function e(){var t,a=arguments;if(!a.length)return s;if("setGdprApplies"===a[0])
        a.length>3&&2===a[2]&&"boolean"==typeof a[3]&&(t=a[3],"function"==typeof a[2]&&a[2]("set",!0));
        else if("ping"===a[0]){var i={gdprApplies:t,cmpLoaded:!1,cmpStatus:"stub"};
        "function"==typeof a[2]&&a[2](i)}else"init"===a[0]&&"object"==typeof a[3]&&(a[3]=Object.assign(a[3],{tag_version:"V2"}))
        ,s.push(a)},i.addEventListener("message",function e(t){var a="string"==typeof t.data,s={};
        try{s=a?JSON.parse(t.data):t.data}catch(i){}var n=s.__tcfapiCall;n&&
        window.__tcfapi(n.command,n.version,function(e,s){var i={__tcfapiReturn:{returnValue:e,success:s,callId:n.callId}};
        a&&(i=JSON.stringify(i)),t&&t.source&&t.source.postMessage&&t.source.postMessage(i,"*")},n.parameter)},!1))}();
        var i=function(){var e=arguments;typeof window.__uspapi!==i&&setTimeout(function(){
        void 0!==window.__uspapi&&window.__uspapi.apply(window.__uspapi,e)},500)},
        n=function(){s++,window.__uspapi===i&&s<3?console.warn("USP is not accessible"):clearInterval(c)};
        if(void 0===window.__uspapi){window.__uspapi=i;var c=setInterval(n,6e3)}}();
    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-122702268-1', 'auto');
        ga('send', 'pageview')
    </script>
    <?php endif; ?>

    <script src="http://laravel-site.test/dist/js/d8ffbb402c7fc8b2bba6.js"></script>
    <script src="http://laravel-site.test/dist/js/555c6bcefecd403f3a59.js"></script>
    <script src="http://laravel-site.test/dist/js/bd4e8062010505e869c3.js"></script>
    <?php if(request()->root() == config('site.admin_url')): ?>
    <script src="http://laravel-site.test/dist/js/77a1c4452dc0b70ae9e5.js"></script>
    <?php endif; ?>
    <?php if(auth()->check() && auth()->user()->is_admin): ?>
    <script src="http://laravel-site.test/dist/js/77a1c4452dc0b70ae9e5.js"></script>
    <?php endif; ?>
    <script src="http://laravel-site.test/dist/js/8350390b394697d84ab2.js"></script>
    <script src="http://laravel-site.test/dist/js/de2db9372f5de3c0c242.js"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>

    <meta name="author" content="Brick Hill">
</head>
<body>
    <nav>
        <div class="primary">
            <div class="grid">
                <div class="push-left">
                    <ul>
                        <?php $__currentLoopData = $nav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e($loc); ?>">
                                <?php echo e($name); ?>

                                <?php if($name == 'Admin' && $adminCount > 0): ?>
                                    <span class="nav-notif"><?php echo e($adminCount); ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="nav-user push-right" id="info">
                    <?php if(Auth::check()): ?>
                    <div class="info">
                        <a href="/currency" class="header-data" title="<?php echo e($user->bucks); ?>">
                            <span class="bucks-icon img-white"></span>
                            <?php echo e(Helper::numAbbr($user->bucks)); ?>

                        </a>
                        <a href="/currency" class="header-data" title="<?php echo e($user->bits); ?>">
                            <span class="bits-icon img-white"></span>
                            <?php echo e(Helper::numAbbr($user->bits)); ?>

                        </a>
                        <a href="/messages" class="header-data">
                            <span class="messages-icon img-white"></span>
                            <?php echo e(Helper::numAbbr($user->receivedMessages()->unread()->count())); ?>

                        </a>
                        <a href="/friends" class="header-data">
                            <span class="friends-icon img-white"></span>
                            <?php echo e(Helper::numAbbr($user->friendRequests()->count())); ?>

                        </a>
                    </div>
                    <?php endif; ?>
                    <?php if(auth()->guard()->check()): ?>
                    <div class="username ellipsis">
                        <div id="username-bar">
                            <div class="username-holder ellipsis inline unselectable"><?php echo e($user['username']); ?></div>
                            <i class="arrow-down img-white"></i>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(auth()->guard()->guest()): ?>
                    <div class="username login-buttons">
                        <a href="/login" class="login-button">Login</a>
                        <a href="/register" class="register-button">Register</a>
                    </div>
                    <?php endif; ?>
                   
                </div>
            </div>
        </div>
        <?php if(auth()->guard()->check()): ?>
        <div class="secondary">
            <div class="grid">
                <div class="bottom-bar">
                    <ul>
                        <?php $__currentLoopData = $secondaryNav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e($loc); ?>" id="p<?php echo e($name); ?>">
                                <?php echo e($name); ?>

                                <?php if($name == 'Trades' && ($tradeCount = $user->trades()->count()) > 0): ?>
                                    <span class="nav-notif"><?php echo e($tradeCount); ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </nav>
    <?php if(auth()->guard()->check()): ?>
    <dropdown id="dropdown-v" class="dropdown" activator="username-bar" contentclass="logout-dropdown">
        <ul>
            <li>
                <a onclick="document.getElementById('logout').submit()">Logout</a>
            </li>
        </ul>
        <form method="POST" action="<?php echo e(route('logout')); ?>" id="logout">
            <?php echo csrf_field(); ?>
        </form>
    </dropdown>
    <?php endif; ?>

    <?php if (\Illuminate\Support\Facades\Blade::check('ads')): ?>
    <div class="side-ad" id="100128-4">
        <script src="//ads.themoneytizer.com/s/gen.js?type=4"></script>
        <script src="//ads.themoneytizer.com/s/requestform.js?siteId=100128&formatId=4"></script>
    </div>
    <div class="side-ad" style="right:0;" id="100128-20">
        <script src="//ads.themoneytizer.com/s/gen.js?type=20"></script>
        <script src="//ads.themoneytizer.com/s/requestform.js?siteId=100128&formatId=20"></script>
    </div>
    <?php endif; ?>

    <?php if (! empty(trim($__env->yieldContent('content-no-grid')))): ?>
        <?php echo $__env->yieldContent('content-no-grid'); ?>
    <?php endif; ?>

    <?php if($event_seen ?? false): ?>
    <mover id="mover-v" event_key="<?php echo e(session('event_key')); ?>" event_type="<?php echo e($event_seen); ?>"></mover>
    <?php endif; ?>

    <?php if (! empty(trim($__env->yieldContent('content')))): ?>
    <div class="main-holder grid">
        <?php if($site_banner ?? false): ?>
        <?php if (\Illuminate\Support\Facades\Blade::check('banner')): ?>
        <div class="col-10-12 push-1-12">
            <div class="alert warning">
                <?php if($site_banner_url ?? false): ?>
                <a href="<?php echo e($site_banner_url); ?>">
                    <?php echo e($site_banner); ?>

                </a>
                <?php else: ?>
                <?php echo e($site_banner); ?>

                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <notification id="notification-v" class="notification"></notification>
        <?php if(auth()->guard()->check()): ?>
        <?php if(($email_sent ?? false) && !session('denied_email')): ?>
        <div class="col-10-12 push-1-12">
            <div class="alert success">
                You need to verify your email!
                <a href="<?php echo e(route('sendEmail')); ?>" class="button small red" style="margin-right:15px;margin-left:10px;">Send Email</a>
                <a href="<?php echo e(route('cancelEmail')); ?>" class="button small red">No thanks</a>
            </div>
        </div>
        <?php endif; ?>
        <?php if($email_verified ?? false): ?>
        <div class="col-10-12 push-1-12">
            <div class="alert success">
                Verify your email <?php echo e($email_verified); ?>

                <a href="<?php echo e(route('settings')); ?>" class="button small red">Change Email</a>
            </div>
        </div>
        <?php endif; ?>
        <?php if(($needs_email ?? false) && !session('denied_add')): ?>
        <div class="col-10-12 push-1-12">
            <div class="alert error">
                You don't have an email attached to your account!
                <a href="/settings" class="button small green" style="margin-right:15px;margin-left:10px;">Add One</a>
                <a href="<?php echo e(route('cancelEmailAdd')); ?>" class="button small red">No thanks</a>
            </div>
        </div>
        <?php endif; ?>
        <?php if(session('no_recovery_codes')): ?>
        <div class="col-10-12 push-1-12">
            <div class="alert error">
                <a href="<?php echo e(route('settings')); ?>">
                You have no 2FA recovery codes left! Generate more on the settings page
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <?php if(($errors ?? false) && (!$errors->isEmpty() || $errors->has('errors') || session('success'))): ?>
            <div class="col-10-12 push-1-12">
                <?php switch((!$errors->isEmpty() || $errors->has('errors')) ? 'error' : (session('success') ? 'success' : '')):
                    case ('error'): ?>
                        <div class="alert error">
                        <?php break; ?>
                    <?php case ('success'): ?>
                        <div class="alert success">
                        <?php break; ?>
                    <?php default: ?>
                        <div class="alert warning">
                <?php endswitch; ?>
                    <?php echo e(($errors->first('errors')) ?: ($errors->first() ?: session('success'))); ?>

                </div>
            </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php if (\Illuminate\Support\Facades\Blade::check('ads')): ?>
        <div class="col-10-12 push-1-12">
            <div style="text-align:center;margin-top:20px;padding-bottom:25px;">
                <div id="100128-28">
                    <script src="//ads.themoneytizer.com/s/gen.js?type=28"></script>
                    <script src="//ads.themoneytizer.com/s/requestform.js?siteId=100128&formatId=28"></script>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <main-footer id="mainfooter-v"></main-footer>
</body>
</html>
<?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/layouts/header.blade.php ENDPATH**/ ?>