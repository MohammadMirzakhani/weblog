    <!-- Search Widget -->
    <div class="card my-4">
        <h5 class="card-header">دنبال چی میگردی ؟ 🤔</h5>
        <div class="card-body">
            <form action="{{ route('SearchPost') }}" method="GET">
                <div class="input-group">
                <input type="text" class="form-control" placeholder="جست و جو برای ..." name="search">
                <span class="input-group-btn">
                  <button class="btn btn-secondary " type="submit">برو به ...</button>
                </span>
                </div>
            </form>
        </div>
    </div>

      <!-- Categories Widget -->
      <div class="card my-4">
        <h5 class="card-header">دسته بندی ها</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                  @foreach ($categories as $category)
                    @if(($category->id%2)==0)
                        <li>
                            <a href="#">{{ $category->title }}</a>
                        </li>
                    @endif
                  @endforeach
              </ul>
            </div>
            <div class="col-lg-6">
             <ul class="list-unstyled mb-0">
                @foreach ($categories as $category)
                    @if(($category->id%2)==1)
                        <li>
                            <a href="#">{{ $category->title }}</a>
                        </li>
                    @endif
                  @endforeach
             </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Side Widget -->
      <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">
          You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
        </div>
      </div>
