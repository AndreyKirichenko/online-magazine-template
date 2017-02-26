<?php
class Drawer_menu_walker extends Walker_Nav_Menu
{
    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array|object $args    Additional strings. Actually always an
    instance of stdClass. But this is WordPress.
     * @return void
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
    {
        $classes = empty ( $item->classes ) ? array () : (array) $item->classes;

        $is_active = false;
        $link_active_class = '';
        if( in_array('current-menu-item', $classes)) {
            $is_active = true;
            $link_active_class = ' drawer__navigation-link_active';
        }

        $output .= "<li class='drawer__navigation-item'>";

        $attributes  = '';

        $attributes .='class="drawer__navigation-link'.$link_active_class.'"';

        ! empty( $item->attr_title )
        and $attributes .= ' title="'. esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )
        and $attributes .= ' target="'. esc_attr( $item->target) .'"';
        ! empty( $item->url )
        and ! $is_active
        and $attributes .= ' href="'. esc_attr( $item->url) .'"';

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $item_output = $args->before
            . "<a $attributes>"
            . $args->link_before
            . $title
            . '</a> '
            . $args->link_after
            . $args->after;

        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'walker_nav_menu_start_el'
            ,   $item_output
            ,   $item
            ,   $depth
            ,   $args
        );
    }
}