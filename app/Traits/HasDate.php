<?php

namespace App\Traits;

  trait HasDate {

      /**
       * Return properly formatted date.
       *
       * @param string $column
       * @param string $dateFormat
       * @return string
       */
      public function formatDate(string $column, string $dateFormat = 'long'): string
      {
          # Get date format
          $format = config('app.locales.'.app()->getLocale().'.date_formats.'.$dateFormat);

          # Define variable to hold the formatted date
          $date = '';

          # Format date
          if ($this->$column)
              $date = $this->$column->format('M d, Y');

          # Return formatted date
          return $date;
      }
  }
