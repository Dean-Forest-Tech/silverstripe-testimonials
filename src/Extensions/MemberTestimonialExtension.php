<?php

namespace DFT\SilverStripe\Testimonials\Extensions;

use SilverStripe\ORM\DataExtension;

class MemberTestimonialExtension extends DataExtension 
{
    
    private static $belongs_to = [
        'Testimonial' => 'Testimonial'
    ];

}