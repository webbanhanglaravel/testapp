<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
      <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 @foreach($categories as $category)
                  <li class="nav-item">
                      <a class="nav-link active" href="">{{$category->name}} </a>
                  </li>
                  @endforeach
              </ul>
          </div>
      </div>
  </div>
</nav>
