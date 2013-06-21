/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	 config.language = 'en';
	// config.uiColor = '#AADC6E';
	
   config.filebrowserBrowseUrl = '../../../../../kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = '../../../../../kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = '../../../../../kcfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = '../../../../../kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = '../../../../../kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = '../../../../../kcfinder/upload.php?type=flash';
   config.toolbar = [
   	['Bold','Italic','Strike','Underline','-','TextColor'],['NumberedList','BulletedList','-','Blockquote'],['JustifyLeft','JustifyCenter','JustifyBlock','JustifyRight'],
   	['Link','Unlink','-','PageBreak'],
   	'/',
   	['Format', 'Styles','Font','FontSize','HorizontalRule'],['Outdent','Indent'],
   	'/',
   	['PasteText','PasteFromWord','-','RemoveFormat'],
   	['Undo','Redo'],['Find','Replace','-','Maximize'],['Table', 'Image','SpecialChar'],['Source']
   	] ;
   /*
   config.toolbar = [
	['Preview', 'Print','Save'], ['Bold','Italic','Strike','-','Subscript','Superscript'],['NumberedList','BulletedList','-','Blockquote'],['JustifyLeft','JustifyCenter','JustifyBlock','JustifyRight'],
	['Link','Unlink','-','PageBreak'],['Find','Replace','-','Maximize'],['Source'],
	'/',
	['Format', 'Styles','Font','FontSize','Bold','Italic', 'Underline','-','TextColor','HorizontalRule'],['PasteText','PasteFromWord','-','RemoveFormat'],['Table', 'Image','SpecialChar'],['Outdent','Indent'],
	['Undo','Redo']
	] ;
   */
};
