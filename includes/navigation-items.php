<?
    if($logged == 'in'){
?>
    <li class="welcome"><a href="/"><i>Welcome<? if(isset($firstname)){ echo ', '.$firstname;}?></i></a></li>
    <li class="newSection"><a <? echo nav_permissions('portfolio')         ?> href="/portfolio">Portfolio</a></li>
    <li><a <? echo nav_permissions('blog')              ?> href="/blog">Blog</a></li>
    <li><a <? echo nav_permissions('resume')            ?> href="/resume">Resume</a></li>
    <li><a <? echo nav_permissions('about')             ?> href="/about">About</a></li>
    <li class="newSection"><a <? echo nav_permissions('feedbuilder')       ?> href="/feedbuilder">Feedbuilder</a></li>
    <li><a <? echo nav_permissions('people')            ?> href="/people">People</a></li>
    <li><a <? echo nav_permissions('files')             ?> href="/files">Files</a></li>
    <li><a <? echo nav_permissions('backup')            ?> href="/backup">Backup</a></li>
    <li class="newSection"><a <? echo nav_permissions('google-analytics')  ?> href="https://analytics.google.com/analytics/web/#report/defaultid/a41655156w71170594p73423126/">Google Analytics<i class="fa fa-external-link"></i></a></li>
    <li><a <? echo nav_permissions('feedpress')         ?> href="https://feed.press/">FeedPress<i class="fa fa-external-link"></i></a></li>

    <li><a <? echo nav_permissions('leadfeeder')        ?> href="https://app.leadfeeder.com/25845/leads">Leadfeeder<i class="fa fa-external-link"></i></a></li>
    <li class="newSection"><a <? echo nav_permissions('phpinfo')           ?> href="/phpinfo">PHP version <code><? echo phpversion(); ?></code></a></li>
    <li><a <? echo nav_permissions('phpmyadmin')        ?> href="/phpmyadmin">phpMyAdmin<i class="fa fa-external-link"></i></a></li>

    <li class="newSection"><a href="http://lexpostma.me">lexpostma.me<i class="fa fa-external-link"></i></a></li>
    <li><a href="/logout">Log out</a></li>
<?        
    } else if($logged == 'out'){
?>
    <li><a href="/">Log in</a></li>
<?        
    }
