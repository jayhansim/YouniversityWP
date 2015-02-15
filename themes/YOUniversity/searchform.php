<form method="get" id="searchform" action="/">
  <div class="input-group">
    <input id="search" type="text" name="s" value="<?php the_search_query(); ?>" class="form-control">
    <span class="input-group-btn">
      <button type="submit" class="btn btn-info" type="button">Search</button>
    </span>
  </div><!-- /input-group -->
</form>

