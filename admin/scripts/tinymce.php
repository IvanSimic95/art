<script src="https://cdn.tiny.cloud/1/ly6d0hde1eh4gt59zqmetvn9j0xmv4id59ophuj8ksc56ock/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script type="text/javascript">
    tinymce.init({
        selector: 'textarea#tinymce',
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table paste codesample"
        ],
        toolbar:
            "undo redo | fontselect styleselect fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | codesample action section button | custom_button",
        font_formats:"Segoe UI=Segoe UI;",
        fontsize_formats: "8px 9px 10px 11px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px 50px 52px 54px 56px 58px 60px 62px 64px 66px 68px 70px 72px 74px 76px 78px 80px 82px 84px 86px 88px 90px 92px 94px 94px 96px",
        codesample_languages: [
            {text: 'HTML/XML', value: 'markup'},
            {text: 'JavaScript', value: 'javascript'},
            {text: 'CSS', value: 'css'},
            {text: 'PHP', value: 'php'},
            {text: 'Ruby', value: 'ruby'},
            {text: 'Python', value: 'python'},
            {text: 'Java', value: 'java'},
            {text: 'C', value: 'c'},
            {text: 'C#', value: 'csharp'},
            {text: 'C++', value: 'cpp'}
        ],
        height: 600,
        setup: function (editor) {
            editor.ui.registry.addButton('custom_button', {
                text: 'Add Button',
                onAction: function() {
                    // Open a Dialog
                    editor.windowManager.open({
                        title: 'Add custom button',
                        body: {
                            type: 'panel',
                            items: [{
                                type: 'input',
                                name: 'button_label',
                                label: 'Button label',
                                flex: true
                            },{
                                type: 'input',
                                name: 'button_href',
                                label: 'Button href',
                                flex: true
                            },{
                                type: 'selectbox',
                                name: 'button_target',
                                label: 'Target',
                                items: [
                                    {text: 'None', value: ''},
                                    {text: 'New window', value: '_blank'},
                                    {text: 'Self', value: '_self'},
                                    {text: 'Parent', value: '_parent'}
                                ],
                                flex: true
                            },{
                                type: 'selectbox',
                                name: 'button_rel',
                                label: 'Rel',
                                items: [
                                    {text: 'No value', value: ''},
                                    {text: 'Alternate', value: 'alternate'},
                                    {text: 'Help', value: 'help'},
                                    {text: 'Manifest', value: 'manifest'},
                                    {text: 'No follow', value: 'nofollow'},
                                    {text: 'No opener', value: 'noopener'},
                                    {text: 'No referrer', value: 'noreferrer'},
                                    {text: 'Opener', value: 'opener'}
                                ],
                                flex: true
                            },{
                                type: 'selectbox',
                                name: 'button_style',
                                label: 'Style',
                                items: [
                                    {text: 'Success', value: 'success'},
                                    {text: 'Info', value: 'info'},
                                    {text: 'Warning', value: 'warning'},
                                    {text: 'Error', value: 'error'}
                                ],
                                flex: true
                            }]
                        },
                        onSubmit: function (api) {

                            var html = '<a href="'+api.getData().button_href+'" class="btn btn-'+api.getData().button_style+'" rel="'+api.getData().button_rel+'" target="'+api.getData().button_target+'">'+api.getData().button_label+'</a>';

                            // insert markup
                            editor.insertContent(html);

                            // close the dialog
                            api.close();
                        },
                        buttons: [
                            {
                                text: 'Close',
                                type: 'cancel',
                                onclick: 'close'
                            },
                            {
                                text: 'Insert',
                                type: 'submit',
                                primary: true,
                                enabled: false
                            }
                        ]
                    });
                }
            });
        }
    });

    $(document).ready(function() {
        $('#save-content-form').on('submit', function(e) {
            e.preventDefault();

            var data = $('#save-content-form').serializeArray();
            data.push({name: 'content', value: tinyMCE.get('tinymce').getContent()});

            $.ajax({
                type: 'POST',
                url: window.location.origin+'/admin/scripts/save.php',
                data: data,
                success: function (response, textStatus, xhr) {
                    console.log(response);
                    Swal.fire(
                    'Good job!',
                    'New Post has been Saved!',
                    'success'
                    )
                },
                complete: function (xhr) {
                    
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    var response = XMLHttpRequest;

                }
            }); 
        });
    });
</script>

<form method="post" id="save-content-form">
    <div class="row">
        <div class="col-xl-6">
            <div class="form-floating mb-3">
            <input class="form-control" id="inputTitle" name="title" type="text" placeholder="Title of a Blog Post" />
            <label for="inputTitle">Title</label>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="form-floating mb-3">
            <input class="form-control" id="inputShortlink" name="shortlink" type="text" placeholder="Shortlink (blog post URL)" />
            <label for="inputTitle">Shortlink</label>
            </div>
        </div>
    </div>

				<textarea id="tinymce"></textarea>

			
			<button class="btn btn-primary mt-4" type="submit" style="width:100%;">Submit</button>
		</form>