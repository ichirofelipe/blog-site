<div id="modal" class="modal__overlay">
    <span class="modal__close"></span>
    <div class="container">
        <div class="modal">
            <div class="modal__heading text-center">
                <h3 class="title--sm mt-0">Upload</h3>
            </div>
            <form class="form--validate" method="POST" action="/upload-request" enctype="multipart/form-data">
                <div class="form__group">
                    <input data-fieldname="File" data-rules="required" type="file" name="file" placeholder="File *">
                </div>

                <small class="d-block mt-1"><a class="color-default" href="/upload/sample.csv" download>Download sample file format</a></small>

                <div class="form__actions">
                    <button name="upload" value="<?= $_POST['table']??'' ?>" type="submit" class="form__submit d-block">Continue</button>
                </div>
            </form>
        </div>
    </div>
</div>