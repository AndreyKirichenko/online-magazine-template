<form class='searchform searchform_hidden' role='search' method='get' id='searchform' action='<?php echo home_url( '/' ) ?>' >
    <input class='searchform__input' placeholder="Поиск" type='text' value='<?php echo get_search_query() ?>' name='s' id='s' />
    <input class='searchform__submit' type='submit' id='searchsubmit' value='найти' />
</form>