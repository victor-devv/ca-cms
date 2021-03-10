@extends('layouts.app')

@section('content')

<main role="main">
    <div class="container">
        <form action="{{ route('publish') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row p-4">
                <div class="col-lg-3 bg-white shadow-sm border rounded p-4 m-2">

                    <div class="row">
                        <div class="col-lg-12 table-responsive">
                            <h5 class="text-center">Layout Options</h5>
                            <hr>

                            <!-- <table class="table table-hover w-auto">
                                <thead class="text-primary">
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Active</th>
                                        <th scope="col">View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input class="form-check-input" type="radio" name="layout" id="layout1" value="1" checked>
                                        </td>
                                        <th>
                                            <label>
                                                Layout one
                                            </label>
                                        </th>
                                        <td>
                                            <a href="#" class="ml-5"><i class="material-icons">visibility</i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table> -->
                            <div class="form-check">
                                <div class="row">
                                    <input class="form-check-input" type="radio" name="layout" id="layout1" value="1" checked>
                                    <label class="form-check-label" for="layout1">
                                        Layout one
                                    </label>
                                    <a href="#" class="ml-5 float-right"><i class="material-icons">visibility</i></a>

                                </div>
                            </div>
                            <div class="form-check">
                                <div class="row">
                                    <input class="form-check-input" type="radio" name="layout" id="layout2" value="2">
                                    <label class="form-check-label" for="layout2">
                                        Layout two
                                    </label>
                                    <a href="#" class="ml-5 float-right" disabled><i class="material-icons">visibility</i></a>

                                </div>
                            </div>
                            <div class="form-check">
                                <div class="row">
                                    <input class="form-check-input" type="radio" name="layout" id="layout3" value="3">
                                    <label class="form-check-label" for="layout3">
                                        Layout three
                                    </label>
                                    <a href="#" class="ml-5 float-right" disabled><i class="material-icons">visibility</i></a>
                                </div>
                            </div>

                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="text-center">Logo Slider <label class="btn btn-default"><span class="material-icons float-right">add</span><input type="file" class="form-control" name="logos[]" onchange="$('#logos-info').html(''); $.each(this.files, function( index, value ) { $('#logos-info').append(`<span class='label label-info'>${value.name}</span><br>`) });" multiple hidden /></label></h5>
                            <hr>
                            <div id="logos-info">
                                <h6 class="text-center">No logo selected</h6>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="text-center">Banner Slider <label class="btn btn-default"><span class="material-icons float-right">add</span><input type="file" class="form-control" name="banners[]" onchange="$('#banners-info').html(''); $.each(this.files, function( index, value ) { $('#banners-info').append(`<span class='label label-info'>${value.name}</span><br>`) });" multiple hidden /></label></h5>
                            <hr>
                            <div id="banners-info">
                                <h6 class="text-center">No banner selected</h6>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="text-center">Date & Time Layout</h5>
                            <hr>
                        </div>
                    </div>

                </div>
                <div class="col-lg-5 bg-white shadow-sm border rounded p-4 m-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="text-center">Media Slider</h5>
                            <hr>

                            <div class="row border rounded py-2">
                                <div class="col-lg-6">
                                    <h5 class="text-center">Videos <label class="btn btn-default"><span class="material-icons float-right">add</span><input type="file" class="form-control" name="videos[]" onchange="$('#videos-info').html(''); $.each(this.files, function( index, value ) { $('#videos-info').append(`<span class='label label-info'>${value.name}</span><br>`) });" multiple hidden /></label></h5>
                                    <hr>
                                    <div id="videos-info">
                                        <h6 class="text-center">No video selected</h6>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <h5 class="text-center">Images <label class="btn btn-default"><span class="material-icons float-right">add</span><input type="file" class="form-control" name="images[]" onchange="$('#images-info').html(''); $.each(this.files, function( index, value ) { $('#images-info').append(`<span class='label label-info'>${value.name}</span><br>`) });" multiple hidden /></label></h5>
                                    <hr>
                                    <div id="images-info">
                                        <h6 class="text-center">No image selected</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-lg-12">
                                    <h5 class="text-center">News Content</h5>
                                    <hr>

                                    <div class="row border rounded py-2">
                                        <div class="col-lg-6">
                                            <h5>My Content </h5>
                                            <hr>

                                            <input type="text" name="my_content" placeholder="Add content">
                                        </div>
                                        <div class="col-lg-6">
                                            <h5>RSS Global Content</h5>
                                            <hr>

                                            <input type="text" name="rss_content" placeholder="Add content">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 bg-white shadow-sm border rounded p-4 m-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="text-center">Table</h5>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-success" type="submit">Publish</button>
        </form>
    </div>
</main>
@endsection