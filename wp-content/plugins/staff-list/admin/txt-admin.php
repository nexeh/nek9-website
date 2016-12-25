<?php
/*
 *1-99 Generic labels
 *100-199 Generic messages
 * 200 - .. Other text
 */
function abcfsl_txta($id, $suffix='') {

    switch ($id){
        case 0:
            $out = '';
            break;
        case 1:
            $out = __('Help', 'staff-list');
            break;
        case 2:
            $out = __('Images', 'staff-list');
            break;
        case 3:
            $out = __('Shortcode', 'staff-list');
            break;
        case 4:
            $out = __('Uninstall', 'staff-list');
            break;
        case 5:
            $out = __('Yes', 'staff-list');
            break;
        case 6:
            $out = __('No', 'staff-list');
            break;
        case 7:
            $out = __('Default', 'staff-list');
            break;
        case 9:
            $out = __('Options', 'staff-list');
            break;
       case 11:
            $out = __('Documentation', 'staff-list');
            break;
       case 12:
            $out = __('Admin', 'staff-list');
            break;
       case 13:
            $out = __('Layout', 'staff-list');
            break;
        case 14:
            $out = __('Width', 'staff-list');
            break;
        case 15:
            $out = __('Top Margin', 'staff-list');
            break;
        case 16:
            $out = __('Left Margin', 'staff-list');
            break;
        case 19:
            $out = __('Template Options', 'staff-list');
            break;
        case 20:
            $out = __('Custom', 'staff-list');
            break;
       case 24:
            $out = __('Support', 'staff-list');
            break;
        case 27:
            $out = __('Image', 'staff-list');
            break;
        case 28:
            $out = __('Description', 'staff-list');
            break;
        case 29:
            $out = __('Title', 'staff-list');
            break;
        case 36:
            $out = __('Image Size', 'staff-list');
            break;
        case 38:
            $out = __('Single Line Text', 'staff-list');
            break;
        case 39:
            $out = __('Custom Text', 'staff-list');
             break;
       case 43:
            $out = __('Image Style', 'staff-list');
            break;
        case 47:
            $out = __('Font', 'staff-list');
            break;
        case 48:
            $out = __('Content Container Width', 'staff-list');
            break;
        case 59:
            $out = __('Staff List', 'staff-list');
            break;
       case 83:
            $out = __('Center Container', 'staff-list');
            break;
       case 84:
            $out = __('Center Image Horizontally', 'staff-list');
            break;
        case 86:
            $out = __('Paragraph Text', 'staff-list');
            break;
        //---Generic Messages start at 100-------------------------------------
        case 101:
            $out = __('Valid data entry formats for Width or Margins: 15, 15px, 15%, 1em. Blank (no entry) = default value.', 'staff-list');
            break;
        case 104:
            $out = __('Default: 100%.', 'staff-list');
            break;
        case 106:
            $out = __('Default: 100% of the parent container.', 'staff-list');
            break;
        case 107:
            $out = __('Default: 0 (zero pixels).', 'staff-list');
             break;
        case 109:
            $out = __('Blank (no entry) = default value.', 'staff-list');
            break ;
        //---Non generic text starts at 200-------------------------------------
       case 200:
            $out = __('Email link requires two input fields: <b>link text</b>  and <b>email adress</b>. The <b>link text</b> is the visible part displayed on the page.', 'staff-list');
            break;
        case 201:
            $out = __('', 'staff-list');
            break;
        case 202:
            $out = __('Custom Styles', 'staff-list');
            break;
        case 203:
            $out = __('Staff Member Page', 'staff-list');
            break;
        case 204:
            $out = __('Select Field Type', 'staff-list');
            break;
        case 205:
            $out = __('Field Label (link text)', 'staff-list');
            break;
        case 206:
            $out = __('Static Label & Text', 'staff-list');
            break;
        case 208:
            $out = __('Field Label', 'staff-list');
            break;
        case 209:
            $out = __('Field Description', 'staff-list');
            break;
        case 211:
            $out = __('Field Container Custom CSS Class', 'staff-list');
            break;
        case 212:
            $out = __('What type of content the field will contain: text, hyperlink, email etc.', 'staff-list');
            break;
        case 213:
             $out = __('Staff List Layout', 'staff-list');
            break;
        case 214:
            $out = __('Staff Template', 'staff-list');
            break;
        case 215:
            $out = __('List. Image left, text right.', 'staff-list');
            break;
        case 216:
            $out = __('Field Order', 'staff-list');
            break;
        case 217:
            $out = __('Input Fields', 'staff-list');
            break;
        case 218:
            $out = __('List. Image top, text bottom.', 'staff-list');
            break;
        case 219:
            $out = __('Show Field', 'staff-list');
            break;
        case 221:
            $out = __('Two columns. Image left, text right.', 'staff-list');
            break;
        case 222:
            $out = __('Field Type', 'staff-list');
            break;
        case 223:
            $out = __('Optional. Enter the CSS class name you would like to use in order to override the default styles for this field.', 'staff-list');
            break;
         case 224:
            $out = __('Optional. Enter the CSS style you would like to use in order to override the default styles for this field.', 'staff-list');
            break;
        case 227:
            $out = __('Text Style', 'staff-list');
            break;
       case 228:
            $out = __('Hyperlink', 'staff-list');
            break;
        case 229:
            $out = __('Static Label and Hyperlink', 'staff-list');
            break;
        case 230:
            $out = __('Hyperlink requires two input fields: <b>link text</b>  and <b>href</b>. The <b>href</b> specifies the URL (destination address) of the page the link goes to.', 'staff-list');
            break;
        case 231:
            $out = __('', 'staff-list');
            break;
        case 232:
            $out = __('', 'staff-list');
            break;
        case 233:
            $out = __('Select page the field will show up. You can also hide or delete field.', 'staff-list');
            break;
        case 241:
            $out = __('Create Demo Records', 'staff-list');
            break;
        case 242:
             $out = __('How to create and publish Staff pages', 'staff-list');
            break;
        case 243:
            $out = __('', 'staff-list');
            break;
        case 244:
            $out = __('Select Template', 'staff-list');
            break;
        case 245:
            $out = __('Field Description (link text)', 'staff-list');
            break;
        case 246:
            $out = __('Staff List Page', 'staff-list');
            break;
        case 247:
            $out = __('Text Fields', 'staff-list');
            break;
        case 248:
            $out = __('Highligt Layout Sections', 'staff-list');
            break;
        case 249:
            $out = __('Optional visual assistance during the design stage. Set it to <b>No</b> when done.', 'staff-list');
            break;
        case 250:
            $out = __('Item Columns - Width', 'staff-list');
            break;
        case 251:
            $out = __('Text Container Style', 'staff-list');
            break;
        case 252:
            $out = __('Default style: <b>abcfslPadLPc5</b> (padding left 5%)', 'staff-list');
            break;
        case 253:
            $out = __('Left Column Width - Right Column Width', 'staff-list');
            break;
        case 254:
            $out = __('Default: Padding tip 5%.', 'staff-list');
            break;
        case 255:
            $out = __('Simply drag the items up or down and they will be saved in that order.', 'staff-list');
            break;
        case 256:
            $out = __('Hyperlink with Static Text', 'staff-list');
            break;
        case 257:
            $out = __('Optional. Enter the description for the form field. This will provide the user some direction on how the field should be filled out.', 'staff-list');
            break;
        case 258:
            $out = __('Hyperlink Style', 'staff-list');
            break;
        case 259:
            $out = __('Link Static Text', 'staff-list');
            break;
        case 260:
            $out = __('Optional. Default: 100%. Valid formats: px, %. Example: 15px, 15%. No entry = default value.', 'staff-list');
            break;
        case 261:
            $out = __('Image Link', 'staff-list');
            break;
        case 262:
            $out = __('Select: <b>Yes</b> to horizontally center content container when width is >100%.', 'staff-list');
            break;
        case 263:
            $out = __('Select Image', 'staff-list');
            break;
        case 264:
            $out = __('Enter the text to display as link text. The same text is used for all hyperlinks.', 'staff-list');
            break;
        case 265:
            $out = __('Field Container Style', 'staff-list');
            break;
        case 266:
            $out = __('No list items found. There maybe no items or none of the existing items is linked to this template.', 'staff-list');
            break;
        case 267:
            $out = __('Swiching templates may cause loss of data.', 'staff-list');
            break;
        case 268:
            $out = __('Staff Member Data', 'staff-list');
            break;
        case 269:
            $out = __('Optional. Text to sort staff members by. Leave empty if you\'ll sort staff list manually.', 'staff-list');
            break;
        case 272:
            $out = __('1. Create a new Post or Page.', 'staff-list');
            break;
        case 273:
            $out = __('2. Copy <b>Staff Member Page</b> shortcode (from above) and paste it into the Post or Page content editor.', 'staff-list');
            break;
        case 274:
            $out = __('3. Save the page.', 'staff-list');
            break;
        case 275:
            $out = __('4. Open the newly created page.', 'staff-list');
            break;
        case 276:
            $out = __('6. Copy page\'s URL from the address bar.', 'staff-list');
            break;
        case 277:
            $out = __('7. Paste it into Staff Member Page URL field (below).', 'staff-list');
            break;
        case 278:
            $out = __('Text Container Width = Image Width', 'staff-list');
            break;
        case 279:
            $out = __('Default: DIV. Select HTML tag for field content.', 'staff-list');
            break;
        case 280:
            $out = __('Staff Order', 'staff-list');
            break;
        case 282:
            $out = __('Enter the label of the form field. This is the field title the user will see when filling out the form.', 'staff-list');
            break;
        case 283:
            $out = __('Paragraph Text', 'staff-list');
            break;
        case 284:
            $out = __('To use the same image for Staff Member Page and Staff Page enter <span class="abcflFontFV abcflFontS12 abcflFontW700">SP</span>.', 'staff-list');
            break;
        case 285:
            $out = __('Field ID.&nbsp;&nbsp;Field type.', 'staff-list');
            break;
        case 286:
            $out = __('Field Display Options', 'staff-list');
            break;
        case 287:
            $out = __('Field HTML Tag.', 'staff-list');
            break;
        case 288:
            $out = __('Demo', 'staff-list');
            break;
        case 289:
            $out = __('Custom Inline Style ', 'staff-list');
            break;
        case 290:
            $out = __('Email', 'staff-list');
            break;
        case 291:
            $out = __('Field ID', 'staff-list');
            break;
        case 292:
            $out = __('Static Label Text', 'staff-list');
            break;
        case 293:
            $out = __('Text to display next to data entered by the user. <b>Example:</b> Phone:', 'staff-list');
            break;
        case 294:
            $out = __('Demo Records', 'staff-list');
            break;
        case 295:
            $out = __('Hide', 'staff-list');
            break;
        case 296:
            $out = __('Disable editing to prevent accidental changes.', 'staff-list');
            break;
        case 297:
            $out = __('Editing has been disabled. Ucheck chekbox and update record to enable.', 'staff-list');
            break;
        case 300:
            $out = __('Field Label (email adress)', 'staff-list');
            break;
        case 301:
            $out = __('Staff Member Container Style', 'staff-list');
            break;
        case 302:
            $out = __('Field Label (href)', 'staff-list');
            break;
        case 303:
            $out = __('Staff Container Style', 'staff-list');
            break;
        case 304:
            $out = __('2. Copy <b>Staff List Page</b> shortcode (from above) and paste it into the Post or Page content editor.', 'staff-list');
            break;
        case 305:
            $out = __('Page will display list of staff members.', 'staff-list');
            break;
        case 308:
            $out = __('Container has 12 sections of equal width. Select how many you want to use for left and right columns.', 'staff-list');
            break;
        case 309:
            $out = __('Optional. Text container can span the width of the column or be limited to width of the image.', 'staff-list');
            break;
        case 310:
            $out = __('Image: Staff List Page', 'staff-list');
            break;
        case 312:
            $out = __('Image URL', 'staff-list');
            break;
        case 315:
            $out = __('Left Margin (%)', 'staff-list');
            break;
        case 317:
            $out = __('Field Description (href)', 'staff-list');
            break;
        case 318:
            $out = __('Bottom Margin (%)', 'staff-list');
            break;
        case 319:
            $out = __('Data Entry Options', 'staff-list');
            break;
        case 320:
            $out = __('Add a New Field', 'staff-list');
            break;
        case 321:
            $out = __('Delete Field', 'staff-list');
            break;
        case 323:
            $out = __('Custom CSS Class', 'staff-list');
            break;
         case 327:
            $out = __('You can\'t delete this template. It\'s used by one or more staff members.', 'staff-list');
            break;
         case 328:
            $out = __('You\'ve reached maximum number of templates.', 'staff-list');
            break;
        default:
            $out = '';
            break;
    }
    return $out . $suffix;
}

function abcfsl_txta_reqired($id, $suffix='', $required=false) {

    $txt = abcfsl_txta($id, $suffix='');
    $star = '';
    if($required){ $star = '<b class="abcflRed abcflFontS14"> *</b>'; }
    return $txt . $star;

}