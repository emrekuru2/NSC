<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run()
    {
        $news = [
            [
                'userID' => 1,
                'title' => 'erat neque',
                'content' => '<h4>This is an example news!&nbsp;</h4>
                <p><code>checking editor functions...</code></p>
                <p><img src="https://www.planetware.com/wpimages/2019/11/canada-in-pictures-beautiful-places-to-photograph-morraine-lake.jpg" alt="" width="242" height="161"></p>
                <p>&nbsp;</p>',

            ],
            [
                'userID' => 1,
                'title' => 'Duis dignissim',
                'content' => '<h4>This is an example news!&nbsp;</h4>
                <p><code>checking editor functions...</code></p>
                <p><img src="https://www.planetware.com/wpimages/2019/11/canada-in-pictures-beautiful-places-to-photograph-morraine-lake.jpg" alt="" width="242" height="161"></p>
                <p>&nbsp;</p>',
            ],
            [
                'userID' => 1,
                'title' => 'aliquet libero.',
                'content' => '<h4>This is an example news!&nbsp;</h4>
                <p><code>checking editor functions...</code></p>
                <p><img src="https://www.planetware.com/wpimages/2019/11/canada-in-pictures-beautiful-places-to-photograph-morraine-lake.jpg" alt="" width="242" height="161"></p>
                <p>&nbsp;</p>',
            ],
            [
                'userID' => 1,
                'title' => 'mauris, rhoncus',
                'content' => '<h4>This is an example news!&nbsp;</h4>
                <p><code>checking editor functions...</code></p>
                <p><img src="https://www.planetware.com/wpimages/2019/11/canada-in-pictures-beautiful-places-to-photograph-morraine-lake.jpg" alt="" width="242" height="161"></p>
                <p>&nbsp;</p>',
            ],
            [
                'userID' => 1,
                'title' => 'consequat nec,',
                'content' => '<h4>This is an example news!&nbsp;</h4>
                <p><code>checking editor functions...</code></p>
                <p><img src="https://www.planetware.com/wpimages/2019/11/canada-in-pictures-beautiful-places-to-photograph-morraine-lake.jpg" alt="" width="242" height="161"></p>
                <p>&nbsp;</p>',
            ]
        ];
        $this->db->table('nsca_news')->insertBatch($news);

        $comments = [
            [
                'newsID' => 3,
                'userID' => 4,
                'comment' => 'consequat enim diam vel arcu. Curabitur',
            ],
            [
                'newsID' => 2,
                'userID' => 5,
                'comment' => 'consectetuer euismod est arcu',
            ],
            [
                'newsID' => 5,
                'userID' => 3,
                'comment' => 'feugiat. Sed nec metus',
            ],
            [
                'newsID' => 1,
                'userID' => 4,
                'comment' => 'est. Nunc ullamcorper, velit',
            ],
            [
                'newsID' => 1,
                'userID' => 4,
                'comment' => 'vel pede blandit',
            ]
        ];
        $this->db->table('nsca_news_comments')->insertBatch($comments);
    }
}
