@extends('backend.layout')

@section('title')
    <title>{{ \App\Models\Settings::blogTitle() }} | Media</title>
@stop

@section('content')
    <section id="main">
        @include('backend.shared.partials.sidebar-navigation')
        <section id="content">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <ol class="breadcrumb">
                            <li><a href="{!! route('canvas.admin') !!}">Home</a></li>
                            <li class="active">Media</li>
                        </ol>
                        <ul class="actions">
                            <li class="dropdown">
                                <a href="" data-toggle="dropdown">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="{!! route('canvas.admin.upload') !!}"><i class="zmdi zmdi-refresh-alt pd-r-5"></i> Refresh Media</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <h2>Media Library
                            <small>All the files you’ve uploaded are listed alphabetically in the Media Library. Double-click a folder name to
                                see its contents.
                            </small>
                        </h2>
                    </div>

                    <input type="file" class="" name="files[]" multiple="multiple"/>
<button id="uploadFile">upload</button>
<table class="table">
<tr>
  <th>Name</th>
  <th>Type</th>
  <th>Date</th>
</tr>
</table>

                    <media-manager></media-manager>
                </div>
            </div>
        </section>
    </section>
@stop

@section('unique-js')
    <script>
$(function() {
$("#uploadFile").on("click", function() {
        var fileSelectDom = $('[type=file]')[0];
        var files = fileSelectDom.files;


        event.preventDefault();

                /**
                 * Create a new form request object.
                 * Gather all of the files to be uploaded and append them to it.
                 * Attach the current path so the server knows where to upload the files to.
                 * Send a post request to the server...
                 */
                var form = new FormData();

                for (var key in files) {
                    form.append('files[' + key + ']', files[key]);
                }
                axios.post('/adm/upload/file', form).then(
                    function (response) {
                            console.log(response);
                        this.mediaManagerNotify(response.data.success);
                        this.loadFolder(this.currentPath);
                    },
                    function (response) {
                        var error = (response.data.error) ? response.data.error : response.statusText;
                        // when uploading we might have some files uploaded and others fail
                        if (response.data.notices) this.mediaManagerNotify(response.data.notices);
                            this.mediaManagerNotify(error, 'danger', 5000);
                            this.loadFolder(this.currentPath);
                        }
                    );
});
});

        new Vue({
            el: '#main',
            created: function () {
                window.eventHub.$on('media-manager-notification', function (message, type, time) {
                    $.growl({
                        message: message
                    }, {
                        type: 'inverse',
                        allow_dismiss: false,
                        label: 'Cancel',
                        className: 'btn-xs btn-inverse',
                        placement: {
                            from: 'top',
                            align: 'right'
                        },
                        delay: time,
                        animate: {
                            enter: 'animated fadeInRight',
                            exit: 'animated fadeOutRight'
                        },
                        offset: {
                            x: 20,
                            y: 85
                        }
                    });
                });
            }
        });
    </script>
@stop
