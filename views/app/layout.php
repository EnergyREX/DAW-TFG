<?php 

// Function used to render all metadata.

class Layout {

  private $metadata = [];

  function setMetadata(string $lang, string $title, string $description,
  string $keywords, string $author) {
    $this->metadata = [
      'lang' => $lang,
      'title' => $title,
      'author' => $author,
      'description' => $description,
      'keywords' => $keywords
    ];
  }

  function renderLayout($metadata, $route) {
    echo ("<!DOCTYPE html>
      <html lang='{$metadata['lang']}'>
      <head>
        <meta charset='UTF-8'>
        <title>{$metadata['title']}</title>
        <meta name='author' content='{$metadata['author']}'>
        <meta name='description' content='{$metadata['description']}'>
        <meta name='keywords' content='{$metadata['keywords']}'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      </head>
      <body>
      </body>
        
      </html>");
  }
}
?>