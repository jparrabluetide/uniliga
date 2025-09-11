<?php

class Uniliga
{
  private $sports;
  public $sites;
  public function __construct()
  {
    $this->sites = get_sites();
    $this->sports = array(
      1 => '',
      2 => 'voley',
      3 => 'baloncesto',
      4 => 'futbol',
      5 => 'flag',
    );
  }
  public function getSiteId()
  {
    return get_current_blog_id();
  }

  public function getSiteName()
  {
    return get_blog_details($this->getSiteId())->blogname;
  }

  public function getBlogIdBySport($sport)
  {
    $sites = $this->sites;
    foreach ($sites as $site) {
      $blog_id = $site['blog_id'];
      $site_name = get_blog_details($blog_id)->blogname;
      if (strpos($site_name, $sport) !== false) {
        return $blog_id;
      }
    }
    return null;
  }

  public function getBlogIdBySportName($sport)
  {
    foreach ($this->sports as $id => $sportName) {
      if (strtolower($sportName) == strtolower($sport)) {
        return $id;
      }
    }
    return 1;
  }
}

?>
