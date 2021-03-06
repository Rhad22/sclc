<?php

namespace App\Traits;
use App\User;
use App\Profile;
use App\Report;
use App\Department;

trait Reports 
{
    public function qr1($id, $year) {
        $from = date($year . '-01-01');
        $to = date($year . '-03-31');
        $qr1 = Report::where('dept_id',$id)
            ->whereBetween('created_at', array($from, $to))
            ->get();
        return $qr1;
    }

    public function qr2($id, $year) {
        $from2 = date($year . '-04-01');
        $to2 = date($year . '-06-30');
        $qr2 = Report::where('dept_id',$id)
            ->whereBetween('created_at', array($from2, $to2))
            ->get();
        return $qr2;
    }

    public function qr3($id, $year) {
        $from3 = date($year . '-07-01');
        $to3 = date($year . '-09-30');
        $qr3 = Report::where('dept_id',$id)
            ->whereBetween('created_at', array($from3, $to3))
            ->get();
        return $qr3;
    }

    public function qr4($id, $year) {
        $from4 = date($year . '-10-01');
        $to4 = date($year . '-12-31');
        $qr4 = Report::where('dept_id', $id)
            ->whereBetween('created_at', array($from4, $to4))
            ->get();
        return $qr4;
    }

    public function qrt($id, $year) {
        $qrt = Report::where('dept_id', $id)
            ->whereYear('created_at', $year)
            ->get();
        return $qrt;
    }

    public function jan($id, $year) {
        $from1 = date($year. '-01-01');
        $to1 = date($year. '-01-31');
        $m1 = Report::where('dept_id', $id)->whereBetween('created_at', array($from1, $to1))->get();
        return $m1;
    }

    public function feb($id, $year) {
        $from2 = date($year. '-02-01');
        $to2 = date($year. '-02-29');
         $m2 = Report::where('dept_id', $id)->whereBetween('created_at', array($from2, $to2))->get();
         return $m2;
    }

    public function mar($id, $year) {
        $from3 = date($year. '-03-01');
        $to3 = date($year. '-03-31');
        $m3 = Report::where('dept_id', $id)->whereBetween('created_at', array($from3, $to3))->get();
        return $m3;
    }

    public function total1($id, $year) {
        $fromt1 = date($year. '-01-01');
        $tot1 = date($year. '-03-31');
        $mt = Report::where('dept_id', $id)->whereBetween('created_at', array($fromt1, $tot1))->get();
        return $mt;
    }

    public function apr($id, $year) {
        $from1 = date($year. '-04-01');
        $to1 = date($year. '-04-31');
        $m1 = Report::where('dept_id', $id)->whereBetween('created_at', array($from1, $to1))->get();
        return $m1;
    }

    public function may($id, $year) {
        $from2 = date($year. '-05-01');
        $to2 = date($year. '-05-30');
        $m2 = Report::where('dept_id', $id)->whereBetween('created_at', array($from2, $to2))->get();
        return $m2;
    }

    public function jun($id, $year) {
        $from3 = date($year. '-06-01');
        $to3 = date($year. '-06-31');
        $m3 = Report::where('dept_id', $id)->whereBetween('created_at', array($from3, $to3))->get();
        return $m3;
    }

    public function total2($id, $year) {
        $fromt1 = date($year. '-04-01');
        $tot1 = date($year. '-06-31');
        $mt = Report::where('dept_id', $id)->whereBetween('created_at', array($fromt1, $tot1))->get();
        return $mt;
    }
    public function jul($id, $year) {
        $from1 = date($year. '-07-01');
        $to1 = date($year. '-07-31');
        $m1 = Report::where('dept_id', $id)->whereBetween('created_at', array($from1, $to1))->get();
        return $m1;
    }

    public function aug($id, $year) {
        $from2 = date($year. '-08-01');
        $to2 = date($year. '-08-30');
        $m2 = Report::where('dept_id', $id)->whereBetween('created_at', array($from2, $to2))->get();
        return $m2;
    }

    public function sept($id, $year) {
        $from3 = date($year. '-09-01');
        $to3 = date($year. '-09-31');
        $m3 = Report::where('dept_id', $id)->whereBetween('created_at', array($from3, $to3))->get();
        return $m3;
    }

    public function total3($id, $year) {
        $fromt1 = date($year. '-07-01');
        $tot1 = date($year. '-09-31');
        $mt = Report::where('dept_id', $id)->whereBetween('created_at', array($fromt1, $tot1))->get();
        return $mt;
    }

    public function oct($id, $year) {
        $from1 = date($year. '-10-01');
        $to1 = date($year. '-10-31');
        $m1 = Report::where('dept_id', $id)->whereBetween('created_at', array($from1, $to1))->get();
        return $m1;
    }

    public function nov($id, $year) {
        $from2 = date($year. '-11-01');
        $to2 = date($year. '-11-30');
        $m2 = Report::where('dept_id', $id)->whereBetween('created_at', array($from2, $to2))->get();
        return $m2;
    }

    public function dec($id, $year) {
        $from3 = date($year. '-12-01');
        $to3 = date($year. '-12-31');
        $m3 = Report::where('dept_id', $id)->whereBetween('created_at', array($from3, $to3))->get();
        return $m3;
    }

    public function total4($id, $year) {
        $fromt1 = date($year. '-10-01');
        $tot1 = date($year. '-12-31');
        $mt = Report::where('dept_id', $id)->whereBetween('created_at', array($fromt1, $tot1))->get();
        return $mt;
    }

    public function sender($id) {
        $list = Report::join('users','users.id','=','reports.user_id')
            ->where('dept_id', $id)
            ->select('user_id')
            ->groupBy('user_id')
            ->get();

        $allsenders = count($list);
        $senders = array();
        for ($i=0; $i < $allsenders ; $i++) { 
            array_push($senders, $list[$i]['user_id']);
        }

        $names = User::whereIn('id', $senders)->get();
        return $names;
    }

    public function daily($id, $year, $month, $length, $days){
        $data = array (0,);
        for ($i=1; $i <= $length; $i++) { 
            $new =  array ();
            for ($x=1; $x <= $days; $x++) { 
                array_push($new, $day = Report::where('dept_id', $id)
                    ->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)
                    ->whereDay('created_at', $x)
                    ->sum('row'.$i));
                }
            array_push($data,$new);
            }
        return $data;
    }

    public function alldaily($id, $year, $month, $length) {
        $total = array (0,);
            for ($x=1; $x <= $length; $x++) { 
                array_push($total, $day = Report::where('dept_id', $id)
                    ->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)
                    ->sum('row'.$x));
            }
        return $total;
    }

    public function data() 
    {
    	$data =  array
            (
                array(),
                array("Communication Department",
                    "01. No. of members following the yearly bible reading plan.",
                    "02. No. of members following the 777 program.",
                    "03. No of church following the hour of worship format",
                    "04. No. of members following the revive by his prophet initiative",
                    "05. No. of church with directional signs.",
                    "06. No. of cable head ends carrying hope channel."),
                array("Children's Ministries",
                    "01. Distributed 2,000 copies of Bible Reading Plan for kids",
                    "02. Encouraged CHM leaders in 200 local churches to follow the Bible Reading Plan",
                    "03. Sold 100 copies of Children's Bible",
                    "04. Encouraged 5 directors to read the 'Great Controversy' book",
                    "05. Reproduced Bible Study Guide",
                    "06. Reproduced Teachers Resource",
                    "07. Monitored 7 directors having bible study guide and morning devotional book for their family worship",
                    "08. Encouraged 7 directors to read and study the 28 Fundamental Beliefs",
                    "09. Sold/Distributed 100 28 FB for Children in missions and conferences",
                    "10. Conducted/Assisted 2 Seminar about Celebration Healthly Inside out",
                    "11. Assisted 4 Health Convention",
                    "12. Distributed 300 copies of Celebration Book for Children with CD songs",
                    "13. Encouraged 7 directors to read Patriarch and Prophets book and The Adventist Home",
                    "14. Encouraged 7 directors and leaders to participate in the prayer and fasting program",
                    "15. Conducted 1 semiminars on Teachers children How to Pray",
                    "16. Conducted 45 Children's Week of Prayer",
                    "17. Conducted in 5 local churches the Bible Verse Power",
                    "18. Encouraged 7 directors to have personal wordship (TAG) at 4:00 AM",
                    "19. Conducted 3 Seminar on How to make Family Wordship Easy and Fun",
                    "20. Encouraged 500 leaders and 500 children to attend on time to their Sabbath School classes and other church wordship",
                    "21. Organized 7 Children's Ministries Associations in Mission and Conferences",
                    "22. Implemented and continue promoting the Kid ministry in 2 conferences, 4 missions, 1 attached field",
                    "23. Collaborated with the 7 Family Ministries director for effective implementation of KID",
                    "24. Reproduce 350 FPM and 350 FPK as a resource materials for KID",
                    "25. Celebrated the Children's Sabbath in 450 churches",
                    "26. Celebrate the World Day of Prayer for children at Risk in 225",
                    "27. Conducted 7 Children's Ministries Leaders empowerment and orientation semiminars",
                    "28. Conducted 7 Leadership Certification Level 1",
                    "29. Attached 7 Seminar on Comprehensive Evangelism/IEL Training",
                    "30. Updated 7 missions, conferences and attached field the number of children according to their levels beginner, kinder, primary and juniors",
                    "31. Conducted 550 VBS",
                    "32. Conducted 400 Branch Sabbath School",
                    "33. Conducted/Assisted 25 evangelistic meeting",
                    "34. Baptized 500 souls through evangelistic meeting",
                    "35. Conducted 2 Stewardship Seminar for children",
                    "36. Gathered quarterly reports from Conferences/Mission",
                    "37. Gathered mid-year reports",
                    "38. Gathered year-end reports",
                    "39. Gathered mid-year statistical reports",
                    "40. Gathered year-end statistical reports",
                    "41. Submitted mid-year statistical report to SSD",
                    "42. Submitted year-end statistical report to SSD",
                    "43. Submitted mid-year accomplishment report to SSD",
                    "44. Submitted year-end accomplishment report to SSD"),
                array("Women's Ministries",
                    "01. No. of women following the new world church program 'Believe His Prophets Plan' for their daily study",
                    "02. No. of women involved in the 777 Prayer Fellowship",
                    "03. No. of women that took Spiritual Gifts Survey to help them grow in their spiritual life",
                    "04. No. of Spiritual Retreats conducted",
                    "05. No. of seminars held on doctrinal studies such as Creation and Righteousness by Faith",
                    "06. No. of women enrolled in Women in the Bible and Me lessons",
                    "07. No. of Spirit-filled women prayer groups",
                    "08. No. of Prayer Breakfast held",
                    "09. No. of churches/companies that celebrated Women's Ministries Emphasis Sabbath",
                    "10. No. of churches/companies that held Abuse Prevention Week",
                    "11. No. of women leaders who submitted their personal profile",
                    "12. No. of activities conducted to Aerobic Exercises",
                    "13. No. of activities conducted to Bridal Showers",
                    "14. No. of activities conducted to Baby Showers",
                    "15. No. of activities conducted to Pajama Night",
                    "16. No. of activities conducted to Senior Citizens programs",
                    "17. No. of activities conducted to Mother-Daugther Banquet/Program",
                    "18. No. of activities conducted to Others",
                    "19. No. of End-It-Now campaigns launched",
                    "20. No. of District Fellowships held with emphasis on women",
                    "21. No. of Leadership Certification Training administered",
                    "22. No. of functional care groups organized led by women leaders",
                    "23. No of community services assisted  and/or conducted such as livelihood, health, seminars, medical mission VBS etc.",
                    "24. No. of evangelistic meetings assisted",
                    "25. No. of evangelistic meeting conducted sponsored by women",
                    "26. No. of people baptized with women's sevices and assistance"),
                array("Ministerial",
                    "01. No. of seminar conducted",
                    "02. No. of churches with Spiritual Program",
                    "03. No. of sermons delivered",
                    "04. No. of Dept. Fellowship",
                    "05. No. of Baptism (Quarter)",
                    "06. No. of Crusade",
                    "07. No. of Laymen's Crusade",
                    "08. No. of newly organized church",
                    "09. No. of newly organized company",
                    "10. No. of new territory entered-Barangay",
                    "11. No. of new territory enterned-Town",
                    "12. No. of Bible studies given",
                    "13. No. of Bible Studies on-going",
                    "14. No. of visits to SDA's",
                    "15. No. of Pastoral visits to non-SDA's",
                    "16. No. of Evangelistic Meetings by District Pastor",
                    "17. No. of On-going Evang. Meeting by District Pastor",
                    "18. No. of Evangelistic Meetings by Visitors/Guests",
                    "19. No. of Cottage Meetings Held by Laymen",
                    "20. No. of Small Group Cottage Meeting",
                    "21. No. of Evangelistic Meeting held by Church Elders",
                    "22. No. of Revival Meeting",
                    "23. No. of Week of Prayer Meeting",
                    "24. No. of 28 Fundamental Beliefs Seminar",
                    "25. No. of VOP Graduates",
                    "26. No. of Stewardship Emphasis Week",
                    "27. No. of sermon on Stewardship",
                    "28. No. of Stewardship Seminar",
                    "29. No. of Stewardship Complaint Church",
                    "30. No. of seminar for Elders",
                    "31. No. of sermon prepared and distributed",
                    "32. No. of books read",
                    "33. No. of written sermon by Pastors",
                    "34. No. of Reports by Evangelism (Financial Reports)",
                    "34. No. of Reports by Baptism (Monthly)",
                    "35. No. of LE recruited (support for APD leaders)"),
                array("Stewardship Ministries",
                    "01. Number of spiritual discipline promotion such as bible study, meditation, Bible reading and reading of Spirit of Prophecy",
                    "02. Number of church involved in district in the promotion of reaching up to God.",
                    "03. Number of monitored churches engage in spiritual discipline",
                    "04. Number of distributed copies of EG White Life Principles",
                    "05. Number of power point presentation of inspired stewardship references form life principles book to local churches",
                    "06. Number of distributed CD's of EGW White Life Principles quatations",
                    "07. Number of churches submitted by pastors for stewardship complaint training",
                    "08. Number of district pastors conducting stewardship complaint training",
                    "09. Number of churches having intentional discripleship training in their churches",
                    "10. Number of trust services promotion",
                    "11. Number of stewardship visitation team visiting",
                    "12. Number of identified non attending members visited",
                    "13. Number of seminars on visitation conducted",
                    "14. Number of new added givers (should tally the names of new envelope users)",
                    "15. Number of non-attending members visited"),
                array("Health Ministries",
                    "01. No. of HM Leaders & Professionals involved in Bible Reading Revived by His Word",
                    "02. No. of HM Leaders & Professionals involved in 777 Prayer initiatives",
                    "03. No. of conducted study/review of the Fundamental Beliefs #22-Healthful Living",
                    "04. No. of held Direction Settings % Commitment programs for local church HM Leaders",
                    "05. No. of distributed booklets 'Why Adventist Church Promote Health Living'",
                    "06. No. of conducted study to local church 'Christ Rogtheousness and Health Reform'",
                    "07. No. of assisted in the improvement of church restrooms/comport rooms",
                    "08. No of conducted seminars in Mental Health and Conflict Resolutions & reconciliation for church members",
                    "09. No. of conducted district Health Fellowships",
                    "10. No. of church members under go health screening",
                    "11. No. of trained young people in the Youth Alive and Drug Abuse Prevention Programs",
                    "12. No. of held Women, Children and Youth Health Camps",
                    "13. No. of promoted Clean & Green program in your district",
                    "14. No. of conducted Healthly Lifestyle semiminars for church members",
                    "15. No. of Medical/Dental/other health services",
                    "16. No. of Anti-illegal drug rally, seminars for surrenderees and students",
                    "17. No. of Healthly Lifestyle seminars",
                    "18. No. of Smoking & Alcohol seminars",
                    "19. No. of Nutrition & Cooking class",
                    "20. No. of health leaders to participate/lead in Care Group Meetings",
                    "21. No. of conducted NEWSTART health & gospel evangelistic meetings",
                    "22. No. of churches/school that conducted cooking class",
                    "23. No. of involved local church as 'Center of Health & Healing'",
                    "24. Prayer and Fasting",
                    "25. Karada",
                    "26. Optical",
                    "27. Blood Letting",
                    "28. Circumcision",
                    "29. Feeding Program",
                    "30. Health lectures in Government Offices",
                    "31. Health lectures in Schools",
                    "32. Organized Fitness Club",
                    "33. Radio Health Program"),
                array("Personal Ministries",
                    "01. Numbers of Sabbath Schools",
                    "02. Total SS Membership",
                    "03. SS Cradle Roll ",
                    "04. SS Kindergarden",
                    "05. SS Primary",
                    "06. SS Juniors",
                    "07. SS Earliteens",
                    "08. SS Youth",
                    "09. SS Adult",
                    "10. SS Extension Division",
                    "11. No. of SS Classes/Small Groups",
                    "12. Vacation Bible School Enrollment",
                    "13. Certified SS Superintendents",
                    "14. Certified SS Teachers",
                    "15. No. of Nurturing Classes",
                    "16. No. of Churces adopted Nurturing Program",
                    "17. No. of Members Attended in Nurturing Classes",
                    "18. No. of Members Attended in Sabbath School Program",
                    "19. No. of Members Attended in Divine Worship",
                    "20. No. of members trained this quarter",
                    "21. No. of members actively involved in Evangelism (i.e. Public Preaching, Bible Study, Visitation Ministry, Revelation Seminar, etc.)",
                    "22. Number of churches that participated in evangelism",
                    "23. No. of Lay Organization",
                    "24. Lay Bible Studies",
                    "25. Baptisms resulting from laymen, pastors, Les",
                    "26. Lay Evangelism Conducted",
                    "27. Trainings -  Seminars conducted",
                    "28. No. of Churches Adopted IEL",
                    "29. No. of Care Groups",
                    "30. No. of IF",
                    "31. No. of CF",
                    "32. Pieces of literature distributed",
                    "33. Community Service Units",
                    "34. No. of Adopt A Barangay Program",
                    "35. No. of ACS Trainings",
                    "36. No. of Disaster Response Manangement Organization",
                    "37. No. of Businessmen",
                    "38. No. of ASI Chapters",
                    "39. No. of Church-based Bible Correspondence School - Enrollments",
                    "40. No. of Church-based Bible Correspondence School - Graduates",
                    "41. No. of Church-based Bible Correspondence School - Baptisms"),
                array("Youth Ministries",
                    "01. AMICUS/PCM-Training/Seminar",
                    "02. AMICUS/PCM-Retreat",
                    "03. Camping",
                    "04. AMICUS/PCM-Care Group Ministry",
                    "05. AMICUS/PCM-Fellowship",
                    "06. No. of AMICUS Chapter",
                    "07. Young Professionals-Training/Seminar",
                    "08. Young Professionals-Retreat",
                    "09. Evangelism",
                    "10. Young Professionals-Care Group Ministry",
                    "11. Young Professionals-Fellowship",
                    "12. MG Training",
                    "13. Pathfinder Training Camp",
                    "14. Camporee",
                    "15. No. of Church-Based Pathfinder Program",
                    "16. No. of Induction Program",
                    "17. No. of Investiture Program",
                    "18. No Invested Master Guide",
                    "19. Pathfinder Day Program",
                    "20. Youth & Young Adults Retreat",
                    "21. Leadership Seminar",
                    "22. VOY Training Seminar",
                    "23. Sports Festival",
                    "24. Youth Festival",
                    "25. No. of VOY Organized",
                    "26. No. of Churches involved in VOY",
                    "27. No. of Youth involved in VOY",
                    "28. No. of Baptism",
                    "29. No. of Churches involved in week of prayer",
                    "30. No. of Churches involved in Global Youth Day",
                    "31. No. of Youth Care Group",
                    "32. No. of Fellowship",
                    "33. No. of Compassion activities"),
                array("Music Ministries",
                    "01. No. of local church music leaders finisheing the 'Follow the Bible Reading Plan'",
                    "02. No. of local church music leaders who have morning devotion with their family using Bible Study Guides and singing Scripture songs in their daily wordship",
                    "03. No. of local music leaders who have a personal study of the Spirit of Prophecy (book for the year)",
                    "04. No. of copies of Adventist Music Guidelines distributed to Music Ministries leaders",
                    "05. No. of conducted seminars on SDA Music guidelines",
                    "06. No. of churches implementing the Adventist Music Guidelines",
                    "07. No. of music ministries leaders joining the world church in prayer program for all SDA's seven days a week every 7am & 7pm",
                    "08. No. of choirs/singing groups assisted in evangeslistic meeting",
                    "09. No. of Music Festival conducted in the Conference",
                    "10. No. of churches that use the 'Song of the Month' program",
                    "11. No. of new Scripture song taught and used each Sabbath in AY service & family wordship",
                    "12. No. of churches that implemented the uniformity of songs/response during Church at Worship on Sabbaths",
                    "13. No. of Scripture songbooks produced/distributed",
                    "14. No. of Music Ministries Leadership training held",
                    "15. No. of organized SCLC Mass choir",
                    "16. No. of organized and maintained Adventist Music Association"),
                array("Family Ministries",
                    "01. No. of Family Ministries leaders and families engaged in regular individual Bible study following Believe His Prophets(Bible Reading Plan)",
                    "02. No. of Family Ministries leaders and families who are in a regular and meaningful family wordship twice a day using age-appropriate Bible Study Guides.",
                    "03. No of Families (couple and single adults) that understand and accept the church's Fundamental Beliefs, and in particular of Marriage and Family (FB 23), Salvation by Faith (FB 10), Creation (FB 6)",
                    "04. No. of Family Ministries Leaders and families who adopt the principles of Healthy Lifestyle",
                    "05. No. of families(couple, single adults) in personal study of EGW writings --Steps to Christ, The Adventist Home, Child Guidance, Patriarchs and Prophets, Prophets and Kings, and other Spirit of Prophecy books focuced on families",
                    "06. No. of Families (couple, single adults, adn senior citizens) in the United Prayer 777 Prayer Fellowship, the 10 Days of Prayer and Prayer and Fasting Program",
                    "07. No. of seminars conducted on Creative Family Worship for all ages",
                    "08. No. of families who return the Faithfully and support mission through generous offering",
                    "09. No. of former and inactive family members reclaimed and revived by coordinating Affirmation of love ceremonies",
                    "10. No. of organized of Christian Couples Circle",
                    "11. No. of Merriage Enrichment Seminars retreats, and convention",
                    "12. No. of  elderly church members who attend retreats and fellowships or Senior Citizens seminar",
                    "13. No. of churches that held family Camps/Retreats, Affirmation of the Family, Family Fun Days, Couples'Retreats/Banquets, Parenting Seminars, and family Nurture Classes",
                    "14. No. of Churches that celebrated the Christian Home and Merriage Sabbaths",
                    "15. No. of Churches that celebrated the Family Togetherness Week (3rd week of September)",
                    "16. No. of youth who attended Pre-marriage Education Seminars & Seminar for Singles and engaged couples who underwent Premarital Counselling",
                    "17. No. of Family Ministries Leaders and advocates equipped through Leadership Certification, Retreat, and Comprehensive Evangelism/IEL Training",
                    "18. No. of Family Ministries Leadership who attended the Adventist Family Conference",
                    "19. No. of families who participated in the Kids in Disciplineship (K.I.D) Ministry",
                    "20. No. of families involved in Integrated Evangelistic Lifestyle through Family-to-family (Mission to the Families)",
                    "21. No. of families involved in Integrated Evangelistic Lifestyle through Care Groups using the Win! Wellness",
                    "22. No. of families involved in Integrated Evangelistic Lifestyle through Healthly Relationships Seminars",
                    "23. No. of families involved in Integrated Evangelistic Lifestyle through Distribution of Missionary Book",
                    "24. no. of Evangelism using the Happy Family and Bible Seminar materials")
            );

        return $data;
    }

    public function dept() {

        $dept = array(
                    "",
                    "Communication Department",
                    "Children s Ministries",
                    "Women s Ministries",
                    "Ministerial",
                    "Stewardship Ministries",
                    "Health Ministries",
                    "Personal Ministries",
                    "Youth Ministries",
                    "Music Ministries",
                    "Family Ministries");

        return $dept;
    }

    public function title() {

        $content = array
            (
                array(15,13),
                array("",
                    "01. No. of members following the yearly bible reading plan.",
                    "02. No. of members following the 777 program.",
                    "03. No of church following the hour of worship format",
                    "04. No. of members following the revive by his prophet initiative",
                    "05. No. of church with directional signs.",
                    "06. No. of cable head ends carrying hope channel."),
                array("",
                    "01. Distributed 2,000 copies of Bible Reading Plan for kids",
                    "02. Encouraged CHM leaders in 200 local churches to follow the Bible Reading Plan",
                    "03. Sold 100 copies of Children's Bible",
                    "04. Encouraged 5 directors to read the 'Great Controversy' book",
                    "05. Reproduced Bible Study Guide",
                    "06. Reproduced Teachers Resource",
                    "07. Monitored 7 directors having bible study guide and morning devotional book for their family worship",
                    "08. Encouraged 7 directors to read and study the 28 Fundamental Beliefs",
                    "09. Sold/Distributed 100 28 FB for Children in missions and conferences",
                    "10. Conducted/Assisted 2 Seminar about Celebration Healthly Inside out",
                    "11. Assisted 4 Health Convention",
                    "12. Distributed 300 copies of Celebration Book for Children with CD songs",
                    "13. Encouraged 7 directors to read Patriarch and Prophets book and The Adventist Home",
                    "14. Encouraged 7 directors and leaders to participate in the prayer and fasting program",
                    "15. Conducted 1 semiminars on Teachers children How to Pray",
                    "16. Conducted 45 Children's Week of Prayer",
                    "17. Conducted in 5 local churches the Bible Verse Power",
                    "18. Encouraged 7 directors to have personal wordship (TAG) at 4:00 AM",
                    "19. Conducted 3 Seminar on How to make Family Wordship Easy and Fun",
                    "20. Encouraged 500 leaders and 500 children to attend on time to their Sabbath School classes and other church wordship",
                    "21. Organized 7 Children's Ministries Associations in Mission and Conferences",
                    "22. Implemented and continue promoting the Kid ministry in 2 conferences, 4 missions, 1 attached field",
                    "23. Collaborated with the 7 Family Ministries director for effective implementation of KID",
                    "24. Reproduce 350 FPM and 350 FPK as a resource materials for KID",
                    "25. Celebrated the Children's Sabbath in 450 churches",
                    "26. Celebrate the World Day of Prayer for children at Risk in 225",
                    "27. Conducted 7 Children's Ministries Leaders empowerment and orientation semiminars",
                    "28. Conducted 7 Leadership Certification Level 1",
                    "29. Attached 7 Seminar on Comprehensive Evangelism/IEL Training",
                    "30. Updated 7 missions, conferences and attached field the number of children according to their levels beginner, kinder, primary and juniors",
                    "31. Conducted 550 VBS",
                    "32. Conducted 400 Branch Sabbath School",
                    "33. Conducted/Assisted 25 evangelistic meeting",
                    "34. Baptized 500 souls through evangelistic meeting",
                    "35. Conducted 2 Stewardship Seminar for children",
                    "36. Gathered quarterly reports from Conferences/Mission",
                    "37. Gathered mid-year reports",
                    "38. Gathered year-end reports",
                    "39. Gathered mid-year statistical reports",
                    "40. Gathered year-end statistical reports",
                    "41. Submitted mid-year statistical report to SSD",
                    "42. Submitted year-end statistical report to SSD",
                    "43. Submitted mid-year accomplishment report to SSD",
                    "44. Submitted year-end accomplishment report to SSD"),
                array("",
                    "01. No. of women following the new world church program 'Believe His Prophets Plan' for their daily study",
                    "02. No. of women involved in the 777 Prayer Fellowship",
                    "03. No. of women that took Spiritual Gifts Survey to help them grow in their spiritual life",
                    "04. No. of Spiritual Retreats conducted",
                    "05. No. of seminars held on doctrinal studies such as Creation and Righteousness by Faith",
                    "06. No. of women enrolled in Women in the Bible and Me lessons",
                    "07. No. of Spirit-filled women prayer groups",
                    "08. No. of Prayer Breakfast held",
                    "09. No. of churches/companies that celebrated Women's Ministries Emphasis Sabbath",
                    "10. No. of churches/companies that held Abuse Prevention Week",
                    "11. No. of women leaders who submitted their personal profile",
                    "12. No. of activities conducted to Aerobic Exercises",
                    "13. No. of activities conducted to Bridal Showers",
                    "14. No. of activities conducted to Baby Showers",
                    "15. No. of activities conducted to Pajama Night",
                    "16. No. of activities conducted to Senior Citizens programs",
                    "17. No. of activities conducted to Mother-Daugther Banquet/Program",
                    "18. No. of activities conducted to Others",
                    "19. No. of End-It-Now campaigns launched",
                    "20. No. of District Fellowships held with emphasis on women",
                    "21. No. of Leadership Certification Training administered",
                    "22. No. of functional care groups organized led by women leaders",
                    "23. No of community services assisted  and/or conducted such as livelihood, health, seminars, medical mission VBS etc.",
                    "24. No. of evangelistic meetings assisted",
                    "25. No. of evangelistic meeting conducted sponsored by women",
                    "26. No. of people baptized with women's sevices and assistance"),
                array("",
                    "01. No. of seminar conducted",
                    "02. No. of churches with Spiritual Program",
                    "03. No. of sermons delivered",
                    "04. No. of Dept. Fellowship",
                    "05. No. of Baptism (Quarter)",
                    "06. No. of Crusade",
                    "07. No. of Laymen's Crusade",
                    "08. No. of newly organized church",
                    "09. No. of newly organized company",
                    "10. No. of new territory entered-Barangay",
                    "11. No. of new territory enterned-Town",
                    "12. No. of Bible studies given",
                    "13. No. of Bible Studies on-going",
                    "14. No. of visits to SDA's",
                    "15. No. of Pastoral visits to non-SDA's",
                    "16. No. of Evangelistic Meetings by District Pastor",
                    "17. No. of On-going Evang. Meeting by District Pastor",
                    "18. No. of Evangelistic Meetings by Visitors/Guests",
                    "19. No. of Cottage Meetings Held by Laymen",
                    "20. No. of Small Group Cottage Meeting",
                    "21. No. of Evangelistic Meeting held by Church Elders",
                    "22. No. of Revival Meeting",
                    "23. No. of Week of Prayer Meeting",
                    "24. No. of 28 Fundamental Beliefs Seminar",
                    "25. No. of VOP Graduates",
                    "26. No. of Stewardship Emphasis Week",
                    "27. No. of sermon on Stewardship",
                    "28. No. of Stewardship Seminar",
                    "29. No. of Stewardship Complaint Church",
                    "30. No. of seminar for Elders",
                    "31. No. of sermon prepared and distributed",
                    "32. No. of books read",
                    "33. No. of written sermon by Pastors",
                    "34. No. of Reports by Evangelism (Financial Reports)",
                    "34. No. of Reports by Baptism (Monthly)",
                    "35. No. of LE recruited (support for APD leaders)"),
                array("",
                    "01. Number of spiritual discipline promotion such as bible study, meditation, Bible reading and reading of Spirit of Prophecy",
                    "02. Number of church involved in district in the promotion of reaching up to God.",
                    "03. Number of monitored churches engage in spiritual discipline",
                    "04. Number of distributed copies of EG White Life Principles",
                    "05. Number of power point presentation of inspired stewardship references form life principles book to local churches",
                    "06. Number of distributed CD's of EGW White Life Principles quatations",
                    "07. Number of churches submitted by pastors for stewardship complaint training",
                    "08. Number of district pastors conducting stewardship complaint training",
                    "09. Number of churches having intentional discripleship training in their churches",
                    "10. Number of trust services promotion",
                    "11. Number of stewardship visitation team visiting",
                    "12. Number of identified non attending members visited",
                    "13. Number of seminars on visitation conducted",
                    "14. Number of new added givers (should tally the names of new envelope users)",
                    "15. Number of non-attending members visited"),
                array("",
                    "01. No. of HM Leaders & Professionals involved in Bible Reading Revived by His Word",
                    "02. No. of HM Leaders & Professionals involved in 777 Prayer initiatives",
                    "03. No. of conducted study/review of the Fundamental Beliefs #22-Healthful Living",
                    "04. No. of held Direction Settings % Commitment programs for local church HM Leaders",
                    "05. No. of distributed booklets 'Why Adventist Church Promote Health Living'",
                    "06. No. of conducted study to local church 'Christ Rogtheousness and Health Reform'",
                    "07. No. of assisted in the improvement of church restrooms/comport rooms",
                    "08. No of conducted seminars in Mental Health and Conflict Resolutions & reconciliation for church members",
                    "09. No. of conducted district Health Fellowships",
                    "10. No. of church members under go health screening",
                    "11. No. of trained young people in the Youth Alive and Drug Abuse Prevention Programs",
                    "12. No. of held Women, Children and Youth Health Camps",
                    "13. No. of promoted Clean & Green program in your district",
                    "14. No. of conducted Healthly Lifestyle semiminars for church members",
                    "15. No. of Medical/Dental/other health services",
                    "16. No. of Anti-illegal drug rally, seminars for surrenderees and students",
                    "17. No. of Healthly Lifestyle seminars",
                    "18. No. of Smoking & Alcohol seminars",
                    "19. No. of Nutrition & Cooking class",
                    "20. No. of health leaders to participate/lead in Care Group Meetings",
                    "21. No. of conducted NEWSTART health & gospel evangelistic meetings",
                    "22. No. of churches/school that conducted cooking class",
                    "23. No. of involved local church as 'Center of Health & Healing'",
                    "24. Prayer and Fasting",
                    "25. Karada",
                    "26. Optical",
                    "27. Blood Letting",
                    "28. Circumcision",
                    "29. Feeding Program",
                    "30. Health lectures in Government Offices",
                    "31. Health lectures in Schools",
                    "32. Organized Fitness Club",
                    "33. Radio Health Program"),
                array("",
                    "01. Numbers of Sabbath Schools",
                    "02. Total SS Membership",
                    "03. SS Cradle Roll ",
                    "04. SS Kindergarden",
                    "05. SS Primary",
                    "06. SS Juniors",
                    "07. SS Earliteens",
                    "08. SS Youth",
                    "09. SS Adult",
                    "10. SS Extension Division",
                    "11. No. of SS Classes/Small Groups",
                    "12. Vacation Bible School Enrollment",
                    "13. Certified SS Superintendents",
                    "14. Certified SS Teachers",
                    "15. No. of Nurturing Classes",
                    "16. No. of Churces adopted Nurturing Program",
                    "17. No. of Members Attended in Nurturing Classes",
                    "18. No. of Members Attended in Sabbath School Program",
                    "19. No. of Members Attended in Divine Worship",
                    "20. No. of members trained this quarter",
                    "21. No. of members actively involved in Evangelism (i.e. Public Preaching, Bible Study, Visitation Ministry, Revelation Seminar, etc.)",
                    "22. Number of churches that participated in evangelism",
                    "23. No. of Lay Organization",
                    "24. Lay Bible Studies",
                    "25. Baptisms resulting from laymen, pastors, Les",
                    "26. Lay Evangelism Conducted",
                    "27. Trainings -  Seminars conducted",
                    "28. No. of Churches Adopted IEL",
                    "29. No. of Care Groups",
                    "30. No. of IF",
                    "31. No. of CF",
                    "32. Pieces of literature distributed",
                    "33. Community Service Units",
                    "34. No. of Adopt A Barangay Program",
                    "35. No. of ACS Trainings",
                    "36. No. of Disaster Response Manangement Organization",
                    "37. No. of Businessmen",
                    "38. No. of ASI Chapters",
                    "39. No. of Church-based Bible Correspondence School - Enrollments",
                    "40. No. of Church-based Bible Correspondence School - Graduates",
                    "41. No. of Church-based Bible Correspondence School - Baptisms"),
                array("",
                    "01. AMICUS/PCM-Training/Seminar",
                    "02. AMICUS/PCM-Retreat",
                    "03. Camping",
                    "04. AMICUS/PCM-Care Group Ministry",
                    "05. AMICUS/PCM-Fellowship",
                    "06. No. of AMICUS Chapter",
                    "07. Young Professionals-Training/Seminar",
                    "08. Young Professionals-Retreat",
                    "09. Evangelism",
                    "10. Young Professionals-Care Group Ministry",
                    "11. Young Professionals-Fellowship",
                    "12. MG Training",
                    "13. Pathfinder Training Camp",
                    "14. Camporee",
                    "15. No. of Church-Based Pathfinder Program",
                    "16. No. of Induction Program",
                    "17. No. of Investiture Program",
                    "18. No Invested Master Guide",
                    "19. Pathfinder Day Program",
                    "20. Youth & Young Adults Retreat",
                    "21. Leadership Seminar",
                    "22. VOY Training Seminar",
                    "23. Sports Festival",
                    "24. Youth Festival",
                    "25. No. of VOY Organized",
                    "26. No. of Churches involved in VOY",
                    "27. No. of Youth involved in VOY",
                    "28. No. of Baptism",
                    "29. No. of Churches involved in week of prayer",
                    "30. No. of Churches involved in Global Youth Day",
                    "31. No. of Youth Care Group",
                    "32. No. of Fellowship",
                    "33. No. of Compassion activities"),
                array("",
                    "01. No. of local church music leaders finisheing the 'Follow the Bible Reading Plan'",
                    "02. No. of local church music leaders who have morning devotion with their family using Bible Study Guides and singing Scripture songs in their daily wordship",
                    "03. No. of local music leaders who have a personal study of the Spirit of Prophecy (book for the year)",
                    "04. No. of copies of Adventist Music Guidelines distributed to Music Ministries leaders",
                    "05. No. of conducted seminars on SDA Music guidelines",
                    "06. No. of churches implementing the Adventist Music Guidelines",
                    "07. No. of music ministries leaders joining the world church in prayer program for all SDA's seven days a week every 7am & 7pm",
                    "08. No. of choirs/singing groups assisted in evangeslistic meeting",
                    "09. No. of Music Festival conducted in the Conference",
                    "10. No. of churches that use the 'Song of the Month' program",
                    "11. No. of new Scripture song taught and used each Sabbath in AY service & family wordship",
                    "12. No. of churches that implemented the uniformity of songs/response during Church at Worship on Sabbaths",
                    "13. No. of Scripture songbooks produced/distributed",
                    "14. No. of Music Ministries Leadership training held",
                    "15. No. of organized SCLC Mass choir",
                    "16. No. of organized and maintained Adventist Music Association"),
                array("",
                    "01. No. of Family Ministries leaders and families engaged in regular individual Bible study following Believe His Prophets(Bible Reading Plan)",
                    "02. No. of Family Ministries leaders and families who are in a regular and meaningful family wordship twice a day using age-appropriate Bible Study Guides.",
                    "03. No of Families (couple and single adults) that understand and accept the church's Fundamental Beliefs, and in particular of Marriage and Family (FB 23)",
                    "04. No. of Family Ministries Leaders and families who adopt the principles of Healthy Lifestyle",
                    "05. No. of families(couple, single adults) in personal study of EGW writings --Steps to Christ, The Adventist Home, Child Guidance, Patriarchs and Prophets",
                    "06. No. of Families (couple, single adults, adn senior citizens) in the United Prayer 777 Prayer Fellowship, the 10 Days of Prayer and Prayer and Fasting Program",
                    "07. No. of seminars conducted on Creative Family Worship for all ages",
                    "08. No. of families who return the Faithfully and support mission through generous offering",
                    "09. No. of former and inactive family members reclaimed and revived by coordinating Affirmation of love ceremonies",
                    "10. No. of organized of Christian Couples Circle",
                    "11. No. of Merriage Enrichment Seminars retreats, and convention",
                    "12. No. of  elderly church members who attend retreats and fellowships or Senior Citizens seminar",
                    "13. No. of churches that held family Camps/Retreats, Affirmation of the Family, Family Fun Days, Couples'Retreats/Banquets, Parenting Seminars",
                    "14. No. of Churches that celebrated the Christian Home and Merriage Sabbaths",
                    "15. No. of Churches that celebrated the Family Togetherness Week (3rd week of September)",
                    "16. No. of youth who attended Pre-marriage Education Seminars & Seminar for Singles and engaged couples who underwent Premarital Counselling",
                    "17. No. of Family Ministries Leaders and advocates equipped through Leadership Certification, Retreat, and Comprehensive Evangelism/IEL Training",
                    "18. No. of Family Ministries Leadership who attended the Adventist Family Conference",
                    "19. No. of families who participated in the Kids in Disciplineship (K.I.D) Ministry",
                    "20. No. of families involved in Integrated Evangelistic Lifestyle through Family-to-family (Mission to the Families)",
                    "21. No. of families involved in Integrated Evangelistic Lifestyle through Care Groups using the Win! Wellness",
                    "22. No. of families involved in Integrated Evangelistic Lifestyle through Healthly Relationships Seminars",
                    "23. No. of families involved in Integrated Evangelistic Lifestyle through Distribution of Missionary Book",
                    "24. no. of Evangelism using the Happy Family and Bible Seminar materials")
            );

        return $content;
    }

    public function notification() {

        $ids = auth()->user()->id;
        $notifies = User::join('notifies','notifies.sender','=','users.id')

            ->where(['receiver'=> $ids, 'read'=> 0])
            ->where('sender', '!=', $ids)
            ->orderBy('notifies.created_at','DESC')
            ->get();

        return $notifies;
    }

    public function sidebar() {

        $id = auth()->user()->id;
        $sidebar = Department::where('user_id', $id)->get();

        return $sidebar;

    }
}

