// Custom CKEditor build entry - includes common non-premium plugins
import ClassicEditorBase from '@ckeditor/ckeditor5-editor-classic/src/classiceditor';
import Essentials from '@ckeditor/ckeditor5-essentials/src/essentials';
import Paragraph from '@ckeditor/ckeditor5-paragraph/src/paragraph';
import Bold from '@ckeditor/ckeditor5-basic-styles/src/bold';
import Italic from '@ckeditor/ckeditor5-basic-styles/src/italic';
import Underline from '@ckeditor/ckeditor5-basic-styles/src/underline';
import Strikethrough from '@ckeditor/ckeditor5-basic-styles/src/strikethrough';
import Heading from '@ckeditor/ckeditor5-heading/src/heading';
import List from '@ckeditor/ckeditor5-list/src/list';
import TodoList from '@ckeditor/ckeditor5-list/src/todolist';
import Link from '@ckeditor/ckeditor5-link/src/link';
import LinkImage from '@ckeditor/ckeditor5-link/src/linkimage';
import Image from '@ckeditor/ckeditor5-image/src/image';
import ImageToolbar from '@ckeditor/ckeditor5-image/src/imagetoolbar';
import ImageCaption from '@ckeditor/ckeditor5-image/src/imagecaption';
import ImageStyle from '@ckeditor/ckeditor5-image/src/imagestyle';
import ImageUpload from '@ckeditor/ckeditor5-image/src/imageupload';
import AutoImage from '@ckeditor/ckeditor5-auto-image/src/autoimage';
import ImageInsert from '@ckeditor/ckeditor5-image/src/imageinsert';
import ImageInline from '@ckeditor/ckeditor5-image/src/imageinline';
import Table from '@ckeditor/ckeditor5-table/src/table';
import TableToolbar from '@ckeditor/ckeditor5-table/src/tabletoolbar';
import MediaEmbed from '@ckeditor/ckeditor5-media-embed/src/mediaembed';
import Font from '@ckeditor/ckeditor5-font/src/font';
import Alignment from '@ckeditor/ckeditor5-alignment/src/alignment';
import Autosave from '@ckeditor/ckeditor5-autosave/src/autosave';

class ClassicEditor extends ClassicEditorBase {}

ClassicEditor.builtinPlugins = [
  Essentials,
  Paragraph,
  Bold,
  Italic,
  Underline,
  Strikethrough,
  Heading,
  List,
  TodoList,
  Link,
  LinkImage,
  Image,
  ImageToolbar,
  ImageCaption,
  ImageStyle,
  ImageUpload,
  AutoImage,
  ImageInsert,
  ImageInline,
  Table,
  TableToolbar,
  MediaEmbed,
  Font,
  Alignment,
  Autosave
];

ClassicEditor.defaultConfig = {
  toolbar: {
    items: [
      'undo','redo','|','heading','|',
      'fontSize','fontFamily','fontColor','fontBackgroundColor','|',
      'bold','italic','underline','strikethrough','|',
      'link','insertImageViaUrl','mediaEmbed','insertTable','|',
      'alignment','|',
      'bulletedList','numberedList','todoList'
    ],
    shouldNotGroupWhenFull: true
  },
  language: 'en',
  image: {
    toolbar: ['toggleImageCaption','imageTextAlternative','|','imageStyle:inline','imageStyle:wrapText','imageStyle:breakText']
  },
  table: {
    contentToolbar: ['tableColumn','tableRow','mergeTableCells']
  },
  fontFamily: { supportAllValues: true },
  fontSize: { options: [10,12,14,'default',18,20,22], supportAllValues: true }
};

export default ClassicEditor;
