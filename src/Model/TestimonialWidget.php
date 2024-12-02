<?php

namespace DFT\SilverStripe\Testimonials\Model;

use SilverStripe\Forms\DropdownField;
use SilverStripe\Widgets\Model\Widget;

if (!class_exists(Widget::class)) {
    return;
}

class TestimonialWidget extends Widget
{
    private static $title = "Testimonial";

    private static $cmsTitle = "Testimonial";

    private static $description = "Displays a random testimonial from the database";

    private static $table_name = "TestimonialWidget";

    private static $has_one = [
        'Page' => TestimonialsHolderPage::class
    ];

    protected $testimonial;

    public function getTestimonial()
    {
        if (!$this->testimonial) {
            $this->testimonial = Testimonial::get()->sort("RAND()")->first();
        }

        return $this->testimonial;
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->push(
            DropdownField::create("PageID","Testimonials Holder Page",
                TestimonialsHolderPage::get()->map()->toArray()
            )->setHasEmptyDefault(true)
        );
        return $fields;
    }

}