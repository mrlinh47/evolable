<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kyushoku-theme
 */

get_header();
get_sidebar();
?>

<div id="top-banner" class="container-fluid">
    <div class="container">
        <h2 class="text-uppercase text-banner">
            Thương hiệu <span class="big-text">Tuyển dụng</span><br/>thu hút nhân tài
        </h2>
        <div id="select-lang" class="dropdown hidden-xs">
            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <?php echo qtranxf_getLanguageName(); ?>
                <span class="caret"></span>
            </button>
            <?php
                if(function_exists('qtranxf_generateLanguageSelectCode')){
                    qtranxf_generateLanguageSelectCode(array(
                        'format' => 'custom',
                        'id' => 'qtranslate-language-index',
                        'class' => 'dropdown-menu'
                    ));
                }
            ?>
        </div>
    </div>
</div>
<div id="home">
    <div id="work-block" class="container-fluid">
        <div class="container">
            <div class="content-blo">
                <div class="row">
                    <div class="col-md-9">
                        <p class="text-uppercase topic-blo">Tìm kiếm việc làm</p>
                    </div>
                </div>
                <div class="row bg-search">
                    <div class="col-xs-12 col-sm-12 col-md-9 left-content">
                        <div id="search-work">
                            <div class="row">
                                <div class="search-byTags col-md-7">
                                    <div class="bg-inner">
                                        <h4 class="title-search text-uppercase">Tìm kiếm theo các điều kiện khác</h4>
                                        <div class="tags-list">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="" class="btn btn-default">Ngành nghề</a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-default">Kỹ năng</a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-default">Mức lương</a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-default">Ngoại ngữ</a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-default">Kỹ năng mềm</a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-default">Tài chính kinh doanh</a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-default">Ngành nghề</a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-default">Ngành nghề</a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-default">Ngành nghề</a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-default">Ngành nghề</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="search-another col-md-5">
                                    <div class="bg-inner search-byKeys">
                                        <h4 class="title-search text-uppercase">Tìm kiếm theo từ khóa</h4>
                                        <form action="" method="POST">
                                            <div class="input-group input-group-md">
                                                <input id="keyword" type="text" class="form-control" placeholder="Keyword">
                                                <span class="input-group-btn">
                                                    <input id="btnSearch" type="submit" class="btn btn-default" type="button">
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="bg-inner search-byPlaces">
                                        <h4 class="title-search text-uppercase">Tìm kiếm theo nơi làm việc</h4>
                                        <div class="tags-list workingPlaces-list">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="" class="btn btn-default">Kanto</a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-default">Kansai</a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-default">Tokai</a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-default">Chubu</a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-default">Viet Nam</a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-default">Cambodia</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="new-work">
                            <p class="text-uppercase topic-blo">Công việc mới</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 job-blo">
                                    <div class="row job-element">
                                        <a href="">
                                            <div class="inner">

                                                <div class="job-img">
                                                    <img src="images/imgNew_job_1.png" alt="Job 1" title="Job 1">
                                                    <div class="visible-xs-block location"><span class="glyphicon glyphicon-map-marker"></span> Tokyo</div>
                                                </div>
                                                <div class="job-content">
                                                    <div class="title-content">Bridge SE (Mobile Application Project Development)</div>
                                                    <div class="skill-content"><span>Kỹ năng:</span> Japanese, Mobile applications</div>
                                                    <div class="salary-content"><span>Mức lương:</span> Ước tính thu nhập hằng năm: 2.4 ~ 3 triệu yên</div>
                                                </div>
                                                <div class="hidden-xs job-location">
                                                    <div><span class="glyphicon glyphicon-map-marker"></span> Tokyo</div>
                                                </div>

                                            </div>
                                        </a>
                                    </div>
                                    <div class="row job-element">
                                        <a href="">
                                            <div class="inner">
                                                <div class="job-img">
                                                    <img src="images/imgNew_job_2.png" alt="Job 1" title="Job 1">
                                                    <div class="visible-xs-block location"><span class="glyphicon glyphicon-map-marker"></span> TP HCM</div>
                                                </div>
                                                <div class="job-content">
                                                    <div class="title-content">Quản lý phát triển doanh nghiệp</div>
                                                    <div class="skill-content"><span>Kỹ năng:</span> Japanese, Sales experience, Management experience</div>
                                                    <div class="salary-content"><span>Mức lương:</span> Ước tính thu nhập hằng năm: 3.5 triệu yên ~ 5 triệu yên</div>
                                                </div>
                                                <div class="hidden-xs job-location">
                                                    <div><span class="glyphicon glyphicon-map-marker"></span> TP HCM</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="row job-element">
                                        <a href="">
                                            <div class="inner">
                                                <div class="job-img">
                                                    <img src="images/imgNew_job_3.png" alt="Job 1" title="Job 1">
                                                    <div class="visible-xs-block location"><span class="glyphicon glyphicon-map-marker"></span> Campuchia</div>
                                                </div>
                                                <div class="job-content">
                                                    <div class="title-content">Lập trình viên (làm việc tại Campuchia)</div>
                                                    <div class="skill-content"><span>Kỹ năng:</span> Japanese, Mobile applications</div>
                                                    <div class="salary-content"><span>Mức lương:</span> Ước tính thu nhập hằng năm: 2.4 ~ 3 triệu yên</div>
                                                </div>
                                                <div class="hidden-xs job-location">
                                                    <div><span class="glyphicon glyphicon-map-marker"></span> Campuchia</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="row job-element">
                                        <a href="">
                                            <div class="inner">
                                                <div class="job-img">
                                                    <img src="images/imgNew_job_4.png" alt="Job 1" title="Job 1">
                                                    <div class="visible-xs-block location"><span class="glyphicon glyphicon-map-marker"></span> Tokyo</div>
                                                </div>
                                                <div class="job-content">
                                                    <div class="title-content">Kỹ sư lập trình Web (lập trình cho Web công ty)</div>
                                                    <div class="skill-content"><span>Kỹ năng:</span> HTML5 & CSS, Javascript, Java, PHP, Ruby,</div>
                                                    <div class="salary-content"><span>Mức lương:</span> 3.5 triệu yen - 5.5 triệu yen</div>
                                                </div>
                                                <div class="hidden-xs job-location">
                                                    <div><span class="glyphicon glyphicon-map-marker"></span> Tokyo</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 right-content">
                        <div class="advertiment-block">
                            <div class="img-responsive">
                                <a href="#">
                                    <img src="images/banner_right.jpg" alt="Banner Advertiment" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="why-agent-block" class="container-fluid blo-shadow">

        <div class="container">

            <h2 class="text-center title-blo">
                エージェントの強み<br class="visible-xs-block"/>(Why Agent)
            </h2>
            <div class="content-blo">
                <div class="row">
                    <div class="col-md-12 agent-blo">
                        <div class="row agent-element">
                            <div class="inner">
                                <div class="agent-img">
                                    <img src="images/img_agent.png" alt="Agent" class="img-responsive">
                                </div>
                                <div class="agent-content">
                                    <p class="title-agent">Title title title title title title title title title title title title title title title title</p>
                                </div>
                            </div>
                        </div>
                        <div class="row agent-element">
                            <div class="inner">
                                <div class="agent-img">
                                    <img src="images/img_agent.png" alt="Agent" class="img-responsive">
                                </div>
                                <div class="agent-content">
                                    <p class="title-agent">Title title title title title title title title title title title title title title title title</p>
                                </div>
                            </div>
                        </div>
                        <div class="row agent-element">
                            <div class="inner">
                                <div class="agent-img">
                                    <img src="images/img_agent.png" alt="Agent" class="img-responsive">
                                </div>
                                <div class="agent-content">
                                    <p class="title-agent">Title title title title title title title title title title title title title title title title</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div id="news-block" class="container-fluid ">
        <div class="container">
            <h2 class="text-center text-uppercase title-blo">
                Tin tức
            </h2>
            <div class="content-blo">
                <div class="row">

                    <div class="col-xs-12 col-sm-4 col-md-4 news-element">
                        <div class="inner">
                            <a href="news_detail.html">
                                <img class="img-responsive" src="images/branch_1.jpg" alt="IMG 1">
                                <div class="info">
                                    <p class="post-date">2017.07.18</p>
                                    <p class="title">Chúng tôi hỗ trợ tuyển dụng hỗ trợ kinh doanh chuyên ngành nha khoa ...</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 news-element">
                        <div class="inner">
                            <a href="news_detail.html">
                                <img class="img-responsive" src="images/branch_2.jpg" alt="IMG 1">
                                <div class="info">
                                    <p class="post-date">2017.07.07</p>
                                    <p class="title">Dịch vụ hỗ trợ kỹ thuật kiểu cư trú kỹ sư ...</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 news-element">
                        <div class="inner">
                            <a href="news_detail.html">
                                <img class="img-responsive" src="images/branch_3.jpg" alt="IMG 1">
                                <div class="info">
                                    <p class="post-date">2017.06.27</p>
                                    <p class="title">Hoàn thành việc mua lại Tổng công ty DeNA Việt Nam ...</p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <a href="news.html" class="text-uppercase link-more">Xem thêm >></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="interview-block" class="container-fluid">
        <h2 class="text-center text-uppercase title-blo">
            Interview
        </h2>
        <span class="arrow-down">

        </span>
    </div>
    <div class="container-fluid interview-block-content">
        <div class="container">
            <div class="content-blo">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 left-content">
                        <div class="inner">
                            <div class="main-interview">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4 col-md-8 col-lg-6 img-profile">
                                        <img src="images/avatar_1.jpg" alt="Avartar1" title="Teamleader" class="img-responsive">
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-4 col-lg-6 content-interview">
                                        <a href="#">
                                            <p class="text-left">Trong quá trình tìm việc mình cũng nhận được giúp đỡ từ bạn bè và cũng có một vài công ty giới thiệu việc làm. Nhưng mình thích làm việc cùng Evolable Asia Agent bởi vì không những công ty giúp mình tìm việc phù hợp, các bạn nhân viên còn hướng dẫn những kỹ năng phỏng vấn và cách giao tiếp như thế nào…</p>
                                            <p class="text-left name"><em>THÁI NGUYÊN VŨ - Team leader (Danang Office)</em></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 right-content">
                        <div class="inner">
                            <div class="sub-element">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4 col-md-12 col-lg-12">
                                        <div class="sub-interview">
                                            <a href="#">
                                                <div class="bg-sub-interview">
                                                    <img src="images/avatar_2.jpg" class="img-responsive" alt="Avatar2">
                                                </div>
                                                <div class="info-sub-interview">
                                                    <em class="text-uppercase">NGUYỄN MINH CHÂU</em>
                                                    <em>Senior Developer (HCM office)</em>
                                                </div>
                                                <div class="avatar-interview img-circle">
                                                    <img src="images/avatar_2.jpg" alt="Avatar2" class="img-responsive">
                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-12 col-lg-12">
                                        <div class="sub-interview">
                                            <a href="#">
                                                <div class="bg-sub-interview">
                                                    <img src="images/avatar_3.jpg" class="img-responsive" alt="Avatar2">
                                                </div>
                                                <div class="info-sub-interview">
                                                    <em class="text-uppercase">MR. Nguyễn Hữu Thịnh</em>
                                                    <em>Senior Developer (HCM office)</em>
                                                </div>
                                                <div class="avatar-interview img-circle">
                                                    <img src="images/avatar_3.jpg" alt="Avatar2" class="img-responsive">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-12 col-lg-12 ">
                                        <div class="sub-interview">
                                            <a href="#">
                                                <div class="bg-sub-interview">
                                                    <img src="images/avatar_4.jpg" class="img-responsive" alt="Avatar2">
                                                </div>
                                                <div class="info-sub-interview">
                                                    <em class="text-uppercase">Vũ Minh Duẫn</em>
                                                    <em>Senior Developer (HCM office)</em>
                                                </div>
                                                <div class="avatar-interview img-circle">
                                                    <img src="images/avatar_4.jpg" alt="Avatar2" class="img-responsive">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="qna-block" class="container-fluid">
        <div class="container">
            <h2 class="text-center text-uppercase title-blo">
                Những câu hỏi thường gặp
            </h2>
            <div class="content-blo">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row inner">
                            <div class="quest-element">
                                <div class="quest-blo">
                                    <div class="quest-img">
                                        <img src="images/icon_quest.png" alt="Question" title="Question" class="img-responsive">
                                    </div>
                                    <div class="quest-content">
                                        <div class="quest-author">Tác giả</div>
                                        <h4 class="quest-title">Tiêu đề câu hỏi text text text text text text text text text text text text text text text text </h4>
                                    </div>
                                </div>
                                <div class="answer-blo">
                                    <div class="answer-img">
                                        <img src="images/icon_answer.png" alt="Answer" title="Answer" class="img-responsive">
                                    </div>
                                    <div class="answer-content">
                                        text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text
                                    </div>
                                </div>
                            </div>
                            <div class="quest-element">
                                <div class="quest-blo">
                                    <div class="quest-img">
                                        <img src="images/icon_quest.png" alt="Question" title="Question" class="img-responsive">
                                    </div>
                                    <div class="quest-content">
                                        <div class="quest-author">Tác giả</div>
                                        <h4 class="quest-title">Tiêu đề câu hỏi text text text text text text text text text text text text text text text text </h4>
                                    </div>
                                </div>
                                <div class="answer-blo">
                                    <div class="answer-img">
                                        <img src="images/icon_answer.png" alt="Answer" title="Answer" class="img-responsive">
                                    </div>
                                    <div class="answer-content">
                                        text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text
                                    </div>
                                </div>
                            </div>
                            <div class="quest-element">
                                <div class="quest-blo">
                                    <div class="quest-img">
                                        <img src="images/icon_quest.png" alt="Question" title="Question" class="img-responsive">
                                    </div>
                                    <div class="quest-content">
                                        <div class="quest-author">Tác giả</div>
                                        <h4 class="quest-title">Tiêu đề câu hỏi text text text text text text text text text text text text text text text text </h4>
                                    </div>
                                </div>
                                <div class="answer-blo">
                                    <div class="answer-img">
                                        <img src="images/icon_answer.png" alt="Answer" title="Answer" class="img-responsive">
                                    </div>
                                    <div class="answer-content">
                                        text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<?php
// get_sidebar();
get_footer();
