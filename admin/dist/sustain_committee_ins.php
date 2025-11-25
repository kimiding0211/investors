<?php
require 'head.php';
require 'sidebar.php';
require 'web_config.php';

// 檢查是否有送出表單
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $years = $_POST['years'];
    $identity = $_POST['identity'];
    $name = $_POST['name'];
    $main_experience = $_POST['main_experience'];
    $election_date = $_POST['election_date'];
    $sort = $_POST['sort'];

    $sql = " insert into sustain_committee set years=$years, identity='$identity', name='$name', main_experience='$main_experience', election_date='$election_date', sort=$sort ";

    $pdo->query($sql);
    echo "<script>alert('資料已新增');window.location.href='audit.php';</script>";
}
?>

<!--begin::Quick Example-->
<div class="card card-primary card-outline mb-4">
    <!--begin::Header-->
    <div class="card-header"><div class="card-title">新增</div></div>
    <!--end::Header-->
    <!--begin::Form-->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <!--begin::Body-->
    <div class="card-body">
        <div class="mb-3">
        <label class="form-label">第幾屆</label>
        <input name="years" class="form-control"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">身份別</label>
        <input name="identity" class="form-control"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">姓名</label>
        <input name="name" class="form-control"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">主要經(學)歷</label>
        <textarea id="editor" name="main_experience"></textarea>
        </div>
        <div class="mb-3">
        <label  class="form-label">選任日期</label>
        <input name="election_date" class="form-control"/>
        </div>
        <div class="mb-3">
        <label  class="form-label">排序</label>
        <input name="sort" class="form-control"/>
        </div>
        <!-- <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" />
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>
        <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" />
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
    </div>
    <!--end::Body-->
    <!--begin::Footer-->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">送出</button>
        <a href="sustain_committee.php" class="btn btn-primary">返回</a>
    </div>
    <!--end::Footer-->
    </form>
    <!--end::Form-->
</div>
<!--end::Quick Example-->

<?php
require 'footer.php';
?>
<script>
    const {
	ClassicEditor,
	Autosave,
	Essentials,
	Paragraph,
	LinkImage,
	Link,
	ImageBlock,
	ImageToolbar,
	Bold,
	CloudServices,
	ImageUpload,
	ImageInsertViaUrl,
	AutoImage,
	Table,
	TableToolbar,
	Heading,
	ImageTextAlternative,
	ImageCaption,
	ImageStyle,
	Italic,
	List,
	MediaEmbed,
	TableCaption,
	TodoList,
	Underline,
	Strikethrough,
	FontBackgroundColor,
	FontColor,
	FontFamily,
	FontSize,
	ImageInline,
	Alignment,
    SimpleUploadAdapter
} = window.CKEDITOR;

const LICENSE_KEY =
	'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3OTM0OTExOTksImp0aSI6ImNiOTVkYjZhLTU4YTAtNDdhMy04Y2JmLTZiZmY0MmU3ZjVjYiIsImxpY2Vuc2VkSG9zdHMiOlsiMTI3LjAuMC4xIiwibG9jYWxob3N0IiwiMTkyLjE2OC4qLioiLCIxMC4qLiouKiIsIjE3Mi4qLiouKiIsIioudGVzdCIsIioubG9jYWxob3N0IiwiKi5sb2NhbCJdLCJ1c2FnZUVuZHBvaW50IjoiaHR0cHM6Ly9wcm94eS1ldmVudC5ja2VkaXRvci5jb20iLCJkaXN0cmlidXRpb25DaGFubmVsIjpbImNsb3VkIiwiZHJ1cGFsIl0sImxpY2Vuc2VUeXBlIjoiZGV2ZWxvcG1lbnQiLCJmZWF0dXJlcyI6WyJEUlVQIiwiRTJQIiwiRTJXIl0sInJlbW92ZUZlYXR1cmVzIjpbIlBCIiwiUkYiLCJTQ0giLCJUQ1AiLCJUTCIsIlRDUiIsIklSIiwiU1VBIiwiQjY0QSIsIkxQIiwiSEUiLCJSRUQiLCJQRk8iLCJXQyIsIkZBUiIsIkJLTSIsIkZQSCIsIk1SRSJdLCJ2YyI6IjIxNDdmZDlhIn0.XVf62gcUrwA2OgelrSKogT-vvyki8Ezv-oFCq_4rl6bMZGUJDv7wfuuejr3nUDNNMm6Fs_UHCiPd7LbypcoX1Q';

const editorConfig = {
    toolbar: {
		items: [
			'undo',
			'redo',
			'|',
			'heading',
			'|',
			'fontSize',
			'fontFamily',
			'fontColor',
			'fontBackgroundColor',
			'|',
			'bold',
			'italic',
			'underline',
			'strikethrough',
			'|',
			'link',
			'insertImageViaUrl',
			'mediaEmbed',
			'insertTable',
			'|',
			'alignment',
			'|',
			'bulletedList',
			'numberedList',
			'todoList'
		],
		shouldNotGroupWhenFull: true
	},
	plugins: [
		Alignment,
		AutoImage,
		Autosave,
		Bold,
		CloudServices,
		Essentials,
		FontBackgroundColor,
		FontColor,
		FontFamily,
		FontSize,
		Heading,
		ImageBlock,
		ImageCaption,
		ImageInline,
		ImageInsertViaUrl,
		ImageStyle,
		ImageTextAlternative,
		ImageToolbar,
		ImageUpload,
		Italic,
		Link,
		LinkImage,
		List,
		MediaEmbed,
		Paragraph,
		Strikethrough,
		Table,
		TableCaption,
		TableToolbar,
		TodoList,
		Underline
	],
	fontFamily: {
		supportAllValues: true
	},
	fontSize: {
		options: [10, 12, 14, 'default', 18, 20, 22],
		supportAllValues: true
	},
	heading: {
		options: [
			{
				model: 'paragraph',
				title: 'Paragraph',
				class: 'ck-heading_paragraph'
			},
			{
				model: 'heading1',
				view: 'h1',
				title: 'Heading 1',
				class: 'ck-heading_heading1'
			},
			{
				model: 'heading2',
				view: 'h2',
				title: 'Heading 2',
				class: 'ck-heading_heading2'
			},
			{
				model: 'heading3',
				view: 'h3',
				title: 'Heading 3',
				class: 'ck-heading_heading3'
			},
			{
				model: 'heading4',
				view: 'h4',
				title: 'Heading 4',
				class: 'ck-heading_heading4'
			},
			{
				model: 'heading5',
				view: 'h5',
				title: 'Heading 5',
				class: 'ck-heading_heading5'
			},
			{
				model: 'heading6',
				view: 'h6',
				title: 'Heading 6',
				class: 'ck-heading_heading6'
			}
		]
	},
	image: {
		toolbar: ['toggleImageCaption', 'imageTextAlternative', '|', 'imageStyle:inline', 'imageStyle:wrapText', 'imageStyle:breakText']
	},
	licenseKey: LICENSE_KEY,
	link: {
		addTargetToExternalLinks: true,
		defaultProtocol: 'https://',
		decorators: {
			toggleDownloadable: {
				mode: 'manual',
				label: 'Downloadable',
				attributes: {
					download: 'file'
				}
			}
		}
	},
	menuBar: {
		isVisible: true
	},
	placeholder: 'Type or paste your content here!',
	table: {
		contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
	},
    ckfinder: { uploadUrl: 'upload.php' },
    simpleUpload: {
        uploadUrl: 'upload.php',   // ★★ 這才是真正的圖片上傳設定
        withCredentials: false
    }
};

ClassicEditor.create(document.querySelector('#editor'), editorConfig)
    .then(editor => {

        editor.plugins.get('FileRepository').createUploadAdapter = loader => {
            return new MyUploadAdapter(loader);
        };

    })
    .catch(error => {
        console.error(error);
    });

class MyUploadAdapter {
    constructor(loader) {
        this.loader = loader;
    }

    upload() {
        return this.loader.file.then(file => new Promise((resolve, reject) => {
            const data = new FormData();
            data.append('upload', file);

            fetch('upload.php', {
                method: 'POST',
                body: data
            })
                .then(response => response.json())
                .then(result => {
                    if (result.url) {
                        resolve({ default: result.url });
                    } else {
                        reject(result.error || 'Upload error');
                    }
                })
                .catch(err => reject('Upload failed.'));
        }));
    }

    abort() {}
}
</script>