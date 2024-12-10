<?php 

// Function used to render all metadata.

class Layout {

  private $metadata = [];

  public function __construct(string $title, string $description,
  string $keywords, string $author) {
    $this->metadata = [
      'title' => $title,
      'author' => $author,
      'description' => $description,
      'keywords' => $keywords
    ];
  }

  function setMetadata(string $title, string $description,
  string $keywords, string $author) {
    $this->metadata = [
      'title' => $title,
      'author' => $author,
      'description' => $description,
      'keywords' => $keywords
    ];
  }

  function renderLayout($metadata, $route) {
    echo ("<!DOCTYPE html>
        <meta charset='UTF-8'>
        <title>{$metadata['title']}</title>
        <meta name='author' content='{$metadata['author']}'>
        <meta name='description' content='{$metadata['description']}'>
        <meta name='keywords' content='{$metadata['keywords']}'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>");
  }
}
?>