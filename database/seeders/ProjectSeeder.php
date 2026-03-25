<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Modern Kitchen Makeover',
                'slug' => 'modern-kitchen-makeover',
                'category' => 'Custom Carpentry',
                'client_name' => 'Karthik Rajan',
                'location' => 'Chennai',
                'cover_image' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=800&q=80&auto=format',
                'summary' => 'Complete modular kitchen with teak wood cabinets, granite countertop, and integrated lighting for a modern family home.',
                'description' => 'A full kitchen renovation featuring custom teak wood cabinetry, soft-close drawers, granite countertops, and under-cabinet LED lighting. The project included a breakfast bar island and built-in pantry storage.',
                'is_featured' => true,
                'is_published' => true,
                'completed_at' => '2025-11-15',
            ],
            [
                'title' => 'Executive Office Interiors',
                'slug' => 'executive-office-interiors',
                'category' => 'General Carpentry',
                'client_name' => 'Senthil Kumar',
                'location' => 'Coimbatore',
                'cover_image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=80&auto=format',
                'summary' => 'Premium office fit-out with custom workstations, conference table, and wood-paneled reception area.',
                'description' => 'Designed and built a 3,000 sq ft corporate office featuring modular workstations for 25 employees, a 12-seater conference table in walnut, wood-paneled reception wall, and custom storage units throughout.',
                'is_featured' => true,
                'is_published' => true,
                'completed_at' => '2025-10-20',
            ],
            [
                'title' => 'Luxury Bedroom Suite',
                'slug' => 'luxury-bedroom-suite',
                'category' => 'Custom Carpentry',
                'client_name' => 'Priya Venkatesh',
                'location' => 'Madurai',
                'cover_image' => 'https://images.unsplash.com/photo-1616594039964-ae9021a400a0?w=800&q=80&auto=format',
                'summary' => 'Master bedroom with king-size bed frame, walk-in wardrobe, dresser unit, and decorative ceiling paneling.',
                'description' => 'Crafted a complete master bedroom suite including a solid rosewood king-size bed with upholstered headboard, 8-door walk-in wardrobe with mirror finish, matching dresser and nightstands, plus decorative wooden ceiling panels.',
                'is_featured' => false,
                'is_published' => true,
                'completed_at' => '2025-09-05',
            ],
            [
                'title' => 'Restaurant Interior Fit-Out',
                'slug' => 'restaurant-interior-fit-out',
                'category' => 'General Carpentry',
                'client_name' => 'Murugan Selvam',
                'location' => 'Trichy',
                'cover_image' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=800&q=80&auto=format',
                'summary' => 'Full restaurant woodwork — dining tables, bar counter, booth seating, and rustic wall paneling.',
                'description' => 'Complete interior carpentry for a 120-seater restaurant. Includes 30 dining tables in reclaimed wood, a 6-meter bar counter, custom booth seating with leather upholstery, rustic wooden wall panels, and wine rack shelving.',
                'is_featured' => true,
                'is_published' => true,
                'completed_at' => '2025-08-12',
            ],
            [
                'title' => 'Wooden Flooring Installation',
                'slug' => 'wooden-flooring-installation',
                'category' => 'General Carpentry',
                'client_name' => 'Arun Prakash',
                'location' => 'Salem',
                'cover_image' => 'https://images.unsplash.com/photo-1615529182904-14819c35db37?w=800&q=80&auto=format',
                'summary' => 'Premium hardwood flooring across a 4BHK villa with herringbone pattern and matte finish.',
                'description' => 'Installed engineered oak hardwood flooring in a herringbone pattern across 2,500 sq ft. The project included floor leveling, moisture barrier installation, and matte polyurethane finishing for a warm, natural look.',
                'is_featured' => false,
                'is_published' => true,
                'completed_at' => '2025-07-28',
            ],
            [
                'title' => 'Living Room TV & Storage Unit',
                'slug' => 'living-room-tv-storage-unit',
                'category' => 'Custom Carpentry',
                'client_name' => 'Tamilselvi Rajan',
                'location' => 'Erode',
                'cover_image' => 'https://images.unsplash.com/photo-1585412727339-54e4bae3bbf9?w=800&q=80&auto=format',
                'summary' => 'Wall-to-wall entertainment unit with concealed storage, display shelves, and integrated LED backlighting.',
                'description' => 'A 14-foot wall-mounted entertainment and storage unit with floating shelves, concealed push-to-open cabinets, display niches with LED backlighting, and cable management system. Built with marine plywood and walnut laminate finish.',
                'is_featured' => false,
                'is_published' => true,
                'completed_at' => '2025-06-10',
            ],
            [
                'title' => 'Boutique Hotel Room Furniture',
                'slug' => 'boutique-hotel-room-furniture',
                'category' => 'General Carpentry',
                'client_name' => 'Kavitha Pandian',
                'location' => 'Pondicherry',
                'cover_image' => 'https://images.unsplash.com/photo-1590490360182-c33d3a18e60c?w=800&q=80&auto=format',
                'summary' => 'Custom furniture for 20 boutique hotel rooms — bed frames, writing desks, luggage racks, and wardrobes.',
                'description' => 'Manufactured identical furniture sets for 20 hotel rooms. Each room received a solid wood bed frame, writing desk with chair, compact wardrobe, luggage rack, and wall-mounted mirror frame. All pieces in a consistent colonial teak style.',
                'is_featured' => true,
                'is_published' => true,
                'completed_at' => '2025-05-18',
            ],
            [
                'title' => 'Pooja Room & Temple Design',
                'slug' => 'pooja-room-temple-design',
                'category' => 'Custom Carpentry',
                'client_name' => 'Meenakshi Sundaram',
                'location' => 'Thanjavur',
                'cover_image' => 'https://images.unsplash.com/photo-1600585152220-90363fe7e115?w=800&q=80&auto=format',
                'summary' => 'Intricately carved teak wood pooja room with traditional gopuram design, brass accents, and hidden storage.',
                'description' => 'Hand-carved pooja mandir in solid teak wood with traditional South Indian gopuram-style top, brass bell and lamp holders, marble flooring base, drawer storage below, and interior LED lighting with dimmer control.',
                'is_featured' => false,
                'is_published' => true,
                'completed_at' => '2025-04-22',
            ],
            [
                'title' => 'Garden Pergola & Deck',
                'slug' => 'garden-pergola-deck',
                'category' => 'General Carpentry',
                'client_name' => 'Deepak Narayanan',
                'location' => 'Ooty',
                'cover_image' => 'https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?w=800&q=80&auto=format',
                'summary' => 'Outdoor wooden pergola with seating area, composite deck flooring, and built-in planter boxes.',
                'description' => 'Built a 400 sq ft outdoor pergola in treated pine with retractable shade canopy, composite wood decking, built-in L-shaped seating with weather-resistant cushions, and integrated planter boxes along the perimeter.',
                'is_featured' => false,
                'is_published' => true,
                'completed_at' => '2025-03-15',
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(['slug' => $project['slug']], $project);
        }
    }
}
