<?php
   /*
   Plugin Name: Curry Pot Recipe Data
   Plugin URI: http://www.curry-pot.com
   Description: A plugin generate microformat data for google
   Version: 1.0
   Author: Shaun
   Author URI: http://www.shaungill.co.uk
   License: GPL2
   */


/*
    <script type="application/ld+json">
{
  "recipeInstructions": [
    "Combine coriander, cumin, turmeric, pepper, chilli, garlic, ginger and lemon juice in a bowl to form a paste. Set aside.",
    "Heat 1 tablespoon of oil in a large saucepan over high heat. Add half the beef. Cook, stirring, for 2 to 3 minutes, or until browned. Transfer to a bowl. Repeat with remaining oil and beef.",
    "Reduce heat to medium. Add spice paste. Cook for 1 minute. Return beef to saucepan. Cook, stirring, for 1 minute, or until meat is coated with paste. Add tomato paste and stock. Bring to the boil. Reduce heat to low. Cover. Cook for 1 hour 45 minutes, or until beef is tender.",
    "Remove lid. Cook, uncovered, for a further 15 minutes, or until sauce has reduced and thickened slightly. Serve with rice and raita. Top with mint , coriander and fresh chilli (optional)."
  ],
  "recipeIngredient": [
    "2 tablespoons ground coriander",
    "1 tablespoon ground cumin",
    "1 teaspoon turmeric",
    "1\/2 teaspoon freshly ground black pepper",
    "1 teaspoon chilli powder (optional)",
    "2 garlic cloves, crushed",
    "2 teaspoons grated ginger",
    "2 1\/2 tablespoons lemon juice",
    "2 tablespoons olive oil",
    "1kg beef chuck steak, cut into 2.5cm cubes",
    "2 tablespoons tomato paste",
    "1 cup Massel beef stock",
    "Steamed Basmati rice, to serve",
    "Raita (see notes), to serve",
    "Coriander, to serve",
    "Mint, to serve",
    "Sliced red chilli, (optional) to serve"
  ],
  "recipeCuisine": null,
  "cookingMethod": null,
  "cookTime": "PT120M",
  "prepTime": "PT25M",
  "totalTime": "PT145M",
  "recipeYield": 4,
  "nutrition": {
    "calories": "554.48 calories",
    "fatContent": "23.4 grams fat",
    "saturatedFatContent": "7.1 grams saturated fat",
    "carbohydrateContent": "4.5 grams carbohydrates",
    "sugarContent": "1.3 grams sugar",
    "fibreContent": null,
    "proteinContent": "67.6 grams protein",
    "cholesterolContent": "223 milligrams cholesterol",
    "sodiumContent": "373 milligrams sodium",
    "@context": "http:\/\/schema.org",
    "@type": "NutritionInformation"
  },
  "aggregateRating": {
    "ratingCount": 104,
    "ratingValue": 4.8,
    "@context": "http:\/\/schema.org",
    "@type": "AggregateRating"
  },
  "name": "Madras beef curry",
  "description": "Create beautiful Indian aromas in your own kitchen with our highest-rated Madras beef curry.",
  "datePublished": "2010-01-01",
  "dateCreated": "2006-09-06",
  "mainEntityOfPage": "\/\/www.taste.com.au\/recipes\/madras-beef-curry\/cbb6fb57-dea5-453b-9214-ed68c3e017f1",
  "dateModified": "2017-08-16",
  "author": {
    "name": "Kerrie Sun",
    "@context": "http:\/\/schema.org",
    "@type": "person"
  },
  "publisher": {
    "name": "taste",
    "logo": null,
    "@context": "http:\/\/schema.org",
    "@type": "Organization"
  },
  "image": {
    "url": "http:\/\/img.taste.com.au\/udDrTbBT\/taste\/2016\/11\/madras-beef-curry-13838-1.jpeg",
    "width": 3000,
    "height": 2000,
    "@context": "http:\/\/schema.org",
    "@type": "ImageObject"
  },
  "video": null,
  "@context": "http:\/\/schema.org",
  "@type": "Recipe"
}
   </script>
*/
add_action("wp_head", "cp_json_ld");

function cp_json_ld() {
   global $post;
   if (is_singular('recipe')) {
      /**
       * Steps
       */
      $steps = strip_tags(get_post_meta( $post->ID, '_cmb_recipe_step', true ));
      $steps = array_filter(explode("\n", $steps));
      unset($steps[0]);
      
      foreach($steps as $step) {
         $output['recipeInstructions'][] = str_replace(array("\r", "\n", "\t"), '', $step);
      }

      /**
       * ingredients
       */
      $ingredients = strip_tags(get_post_meta( $post->ID, '_cmb_recipe_list', true ));
      $ingredients = array_filter(explode("\n", $ingredients));
      unset($ingredients[0]);
      
      foreach($ingredients as $ingredient) {
         $output['recipeIngredient'][] = str_replace(array("\r", "\n", "\t"), '', $ingredient);
      }      

      /**
       * Cuisine
       */
      $terms = get_the_terms( $post->ID , 'cuisine' );
      foreach($terms as $term) {
         $output['recipeCuisine'] = $term->name;
      }

      /**
       * totalTime
       */
      $duration = get_post_meta( $post->ID, '_cmb_recipe_time', true ); 
      $duration = wp_parse_args( $duration, array(
         'hours'    => '',
         'minutes'  => '',
      ));
      $tt = 'PT';

      if( $duration['hours'] ){ 
         $tt .= $duration['hours']."H";
      } else {
         $tt .= "0H";
      }
      if( $duration['minutes'] ){
         $tt .= $duration['minutes']."M";
      }
      $output['totalTime'] = $tt;

      /**
       * recipeYield
       */
      $output['recipeYield'] = get_post_meta( $post->ID, '_cmb_recipe_serving', true );

      /**
       * aggregateRating
       */
      $agg = wp_gdsr_rating_article($post->ID);
      if($agg->visitor_votes != 0) {
         $output['aggregateRating']['ratingCount'] = $agg->visitor_votes;
         $output['aggregateRating']['ratingValue'] = $agg->visitor_rating;
         $output['aggregateRating']['@context']    = 'http://schema.org';
         $output['aggregateRating']['@type']       = 'AggregateRating';
      }

      /**
       * name
       */
      $output['name'] = get_the_title();

      /**
       * description
       */
      $output['description'] = get_post_field('post_content', $post->ID);

      /**
       * datePublished
       */
      $output['datePublished'] = get_the_time('Y-m-d');
      $output['dateCreated'] = get_the_time('Y-m-d');
      
      /**
       * mainEntityOfPage
       */
      $output['mainEntityOfPage'] = get_the_permalink();

      /**
       * dateModified
       */
      $output['dateModified'] = get_the_modified_date('Y-m-d');

      /**
       * author
       */
      $output['author']['name'] = 'Shaun Gill';
      $output['author']['@context'] =  'http://schema.org';
      $output['author']['@type'] = 'person';

      /**
       * image 
       "image": {
    "url": "http:\/\/img.taste.com.au\/udDrTbBT\/taste\/2016\/11\/madras-beef-curry-13838-1.jpeg",
    "width": 3000,
    "height": 2000,
    "@context": "http:\/\/schema.org",
    "@type": "ImageObject"
  },
       */
      $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
      //$output['image']['url']       = wp_get_attachment_url( $thumb,'medium' );
      $output['image']['url']       = $thumb[0];
      $output['image']['width']     = $thumb[1];
      $output['image']['height']    = $thumb[2];
      $output['image']['@context']  = 'http://schema.org';
      $output['image']['@type']     = 'ImageObject';
      /**
       * Generic
       */
      $output['nutrition'] = '';
      $output['@context'] = 'http://schema.org';
      $output['@type'] = 'Recipe';
      echo '<script type="application/ld+json">'.json_encode($output).'</script>';
   }
}
?>