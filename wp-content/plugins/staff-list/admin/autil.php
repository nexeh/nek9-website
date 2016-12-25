<?php
/*
 */
add_filter( 'wp_insert_post_data','abcfsl_autil_untrash_tplate', 10, 2 );

//Don't delete a template it has Staff Members.
function abcfsl_autil_untrash_tplate($data, $postarr ){

    $out = abcfsl_autil_post_type ( $data['post_type'] );
    if( $out == 1){
        switch ( $data['post_status'] ) {
        case 'trash' :
            if( abcfsl_dba_chidren_qty( $postarr['ID'] ) > 0 ){
                wp_die(abcfsl_txta(327) );
                exit;
            }
            break;
        default:
            break;
        }
    }
    return $data;
}
//==============================================================

//Called from abcfolio-staff-list.php. remove_permalink , remove_post_edit_links
function abcfsl_autil_post_type ( $postType ){
    $out = 0;

    switch ($postType) {
        case 'cpt_staff_lst':
            $out = 1;
            break;
        case 'cpt_staff_lst_item':
            $out = 2;
            break;
        default:
            break;
    }
    return $out;
}

//== UPDATE FIELD ORDER - START ===================================================
//Add new field to meta fields order. If field already exists exit with no updates.
//Called from save template.
function abcfsl_autil_add_new_field_to_field_order( $tplatID, $F ){

    //if($F =='SL'){ print_r( $showField ); die;}
    $tplateOptns = get_post_custom( $tplatID );
    $fieldOrderSaved = isset( $tplateOptns['_fieldOrder'] ) ? $tplateOptns['_fieldOrder'][0] : '';

    //echo"<pre>", print_r($fieldOrderSaved), "</pre>";

    $metaFieldName = '_fieldOrder';

    //There is already metadata. Update it
    if( !empty( $fieldOrderSaved ) ){
        abcfsl_autil_update_meta_field_order( $tplatID, $metaFieldName, $fieldOrderSaved, $F );
        return;
    }
    else{
        abcfsl_autil_add_meta_field_order( $tplatID, $metaFieldName, $F );
        return;
    }
}

//No legacy and no new. Add new option with a single field (first one)
function abcfsl_autil_add_meta_field_order( $postID, $metaFieldName, $F ){

    $metaValue[1] = $F;
    update_post_meta( $postID, $metaFieldName, $metaValue );
}

//Meta field exists.
function abcfsl_autil_update_meta_field_order( $postID, $metaFieldName, $metaData, $F ){

    //meta field exists.
    //Check if field is already present in an array if so exit. Otherwise add a new field and exit.

        $metaDataArray = unserialize( $metaData );

        //Check if field is already in an array. If so exit.
        if (in_array($F, $metaDataArray)) {
            return;
        }

        for ( $i = 1; $i <= 20; $i++ ) {

            //Add new field to first available key and exit.
            if(!isset($metaDataArray[$i])){
               $metaDataArray[$i] = $F;
               update_post_meta( $postID, $metaFieldName, $metaDataArray );
               return;
            }
        }
}

//function abcfsl_autil_show_field_for_field_order( $fieldTypeH ){
//
//    $out = false;
//
//    //Hidden field. Fileld type. N = field not selected yet.
//    //For SL value of Show/Hide
//    if($fieldTypeH == 'N'){ return $out; }
//
//    switch ( $showFieldOn ) {
//    case 'Y':
//        $out = true;
//        break;
//    case 'L':
//        if( !$isSingle ){ $out = true; }
//        break;
//    case 'S':
//        if($isSingle ){ $out = true; }
//        break;
//    default:
//        break;
//    }
//
//    return $out;
//}

//== UPDATE FIELD ORDER - END ===================================================

