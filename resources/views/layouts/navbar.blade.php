<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <div class="collapse navbar-collapse justify-content-center">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link text-dark" aria-current="page" href="{{ route('home') }}">خانه</a>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link text-dark" data-bs-toggle="modal" data-bs-target="#addTableModal">
                        افزودن میز
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link text-dark" data-bs-toggle="modal" data-bs-target="#addProductModal">
                        افزودن محصول
                    </button>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('products.index') }}">محصولات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('tables.index') }}">میزها</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="modal fade" id="addTableModal" tabindex="-1" aria-labelledby="addTableModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h1 class="modal-title fs-5" id="addTableModalLabel">افزودن میز</h1>
                <button type="button" class="btn-close m-0 p-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tables.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="table-name" class="col-form-label">نام میز :</label>
                        <input name="name" type="text" class="form-control" id="table-name">
                        <button type="submit" class="btn btn-primary my-2">افزودن</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لغو</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h1 class="modal-title fs-5" id="addProductModalLabel">افزودن محصول</h1>
                <button type="button" class="btn-close m-0 p-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">نام محصول :</label>
                        <input name="product" type="text" class="form-control" id="recipient-name">
                        @error('product')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">قیمت محصول :</label>
                        <input name="price" type="text" class="form-control" id="recipient-name">
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">توضیحات : (اختیاری)</label>
                        <textarea name="description" class="form-control" id="message-text"></textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">افزودن</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
            </div>
        </div>
    </div>
</div>
