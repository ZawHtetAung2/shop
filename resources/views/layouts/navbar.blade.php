<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container justify-content-between">
    <div>
        <a class="navbar-brand" href="{{ route('home') }}">Home</a>
    </div>
    <div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('product.index') }}">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('category.index') }}">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">User</a>
        </li>
      </ul>
    </div>
    </div>
  </div>
</nav>