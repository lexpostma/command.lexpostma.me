<h1>Hi <?=$firstname?>,</h1>

<p>You have <b><?=$userPermission?></b> privileges.</p>


<? 
    if($userPermission == 'admin'){
?>

<ul class="firstList">
    <li><a href="/profile">Edit my profile</a></li>
</ul>

<?        
    }
?>