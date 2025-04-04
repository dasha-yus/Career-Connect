<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\User;
use App\Models\Job;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $jobTypes = Type::factory()->createMany([
            ['name' => 'Remote'],
            ['name' => 'Full-time'],
            ['name' => 'Part-time']
        ]);
        $jobTypeIds = $jobTypes->pluck('id')->toArray();

        Job::factory()->createMany([[
            'title' => 'Lead Software Engineer',
            'description' => 'My client is undergoing an exciting digital transformation, re-platforming its technology stack. They are seeking a Lead Software Engineer to play a key role in shaping the future of their digital platforms. You will lead the design, execution, and integration of cutting-edge solutions across eCommerce, Order Management, and Business Intelligence, working closely with internal teams and third-party suppliers.',
            'company' => 'Adria Solutions',
            'website' => 'https://www.adriasolutions.co.uk',
            'email' => 'info@adriasolutions.co.uk',
            'logo' => 'https://www.adriasolutions.co.uk/wp-content/uploads/2024/11/Adria-logo-square-white-background-800px-square.webp',
            'location' => 'Manchester, UK',
            'user_id' => $user->id,
            'type_id' => $jobTypeIds[array_rand($jobTypeIds)],
        ], [
            'title' => 'Senior Backend Developer',
            'description' => 'If you are an experienced Backend Magento developer, who loves to develop high quality software that will be used by millions of people, my client is offering a fantastic opportunity to utilise this specialised skill. This opportunity will be right for someone looking for the next step in their career, providing an environment that will help you increase your knowledge and skillset, including gaining Magento Certification.',
            'company' => 'Senitor Associates',
            'website' => 'https://www.senitor.com',
            'email' => 'info@senitor.com',
            'logo' => 'https://sitescdn.wearevennture.co.uk/public/senitor/mediahub/senitor-logo-b7b1320b418544c997987bbc6399b799.jpg',
            'location' => 'Manchester, UK',
            'user_id' => $user->id,
            'type_id' => $jobTypeIds[array_rand($jobTypeIds)],
        ], [
            'title' => 'Senior Node Developer',
            'description' => 'iO Associates are working with a fast-growing business that specialise in helping parents teach their kids & the younger generation the value of money in a digital world. This is a very exciting position for a Senior Node.js Developer to be a key player in driving the product forward while using the latest technologies. As a Senior Backend Engineer you will be working across the platform to build solutions that are highly scalable and focused on user experience. Being a Senior Engineer you will work closely with a small group of highly determined, similar minded people to adjust the way people talk and engage with money.',
            'company' => 'IO Associates',
            'website' => 'https://www.brightpurple.co.uk',
            'email' => 'Chris.Murphy@brightpurple.co.uk',
            'logo' => 'https://www.totaljobs.com/CompanyLogos/d3b32861bc8145ad9abfce82e5cd480a.png',
            'location' => 'Glasgow, UK',
            'user_id' => $user->id,
            'type_id' => $jobTypeIds[array_rand($jobTypeIds)],
        ], [
            'title' => 'Senior Backend Developer',
            'description' => 'Unlock your potential with a role that promises growth, innovation, and a collaborative environment. A leading software company, renowned for its dynamic and ever-evolving nature, is seeking a Senior Backend Developer to join their team. This permanent position offers a competitive salary of up to £75,000.',
            'company' => 'Bright Purple',
            'website' => 'https://www.ioassociates.co.uk',
            'email' => 'info@ioassociates.co.uk',
            'logo' => 'https://www.totaljobs.com/CompanyLogos/2572c18a039d4c35a0827c02322f6ae0.png',
            'location' => 'London, UK',
            'user_id' => $user->id,
            'type_id' => $jobTypeIds[array_rand($jobTypeIds)],
        ], [
            'title' => 'Senior Internal Auditor',
            'description' => 'At aberdeen, our ambition is to be the UK`s leading Wealth & Investments group. Strengthening talent and culture is one of our strategic priorities. We strive to make aberdeen a great place to work so that we can attract and retain the industry`s best talent. Our people put our stakeholders at the heart of everything they do by helping us to make a positive difference to the lives of our clients, customers, colleagues, shareholders and society.',
            'company' => 'ABRDN',
            'website' => 'https://www.aberdeeninvestments.com/en-gb',
            'email' => 'kevin.pena@abrdn.com',
            'logo' => 'https://www.kurtosys.com/uploads/2021/05/bd824fc53c69335c379b8fbb86e0e2f0/abrdn_custom_logo.png',
            'location' => 'Edinburgh, UK',
            'user_id' => $user->id,
            'type_id' => $jobTypeIds[array_rand($jobTypeIds)],
        ], [
            'title' => 'Senior Systems Developer',
            'description' => 'We are seeking a seasoned Senior Systems Developer to lead the transition from our legacy Supporter System (SUS), hosted on Advanced CARE NG, to Microsoft Dynamics CRM. This pivotal role involves not only maintaining and enhancing our current systems but also supporting the migration to a modern CRM platform. Proficiency in the Microsoft Power Platform, including Power Apps and Power Automate, is essential.',
            'company' => 'RSPB',
            'website' => 'https://www.rspb.org.uk',
            'email' => 'membership@rspb.org.uk',
            'logo' => 'https://pbs.twimg.com/profile_images/1536971927541145606/VC7qcm6C_400x400.jpg',
            'location' => 'London, UK',
            'user_id' => $user->id,
            'type_id' => $jobTypeIds[array_rand($jobTypeIds)],
        ]]);
    }
}
