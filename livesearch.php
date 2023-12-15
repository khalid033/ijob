<?php
include ("inc/connection.php");

echo "hello";
if(isset($_POST['submit'])){
    $input = $_POST['submit'];
  $query = " SELECT * FROM jobs WHERE title LIKE '{$input}%'";
 $result = mysqli_query($con,$query);
 if(mysqli_num_rows($result)>0){?>

<section class="light">
		
		<div class="container py-2">

			<article class="postcard light green">
				<a class="postcard__img_link" href="#">
					<img class="postcard__img" src="https://picsum.photos/300/300" alt="Image Title" />
				</a>
				<div class="postcard__text t-dark">
					<h3 class="postcard__title green"><a href="#">Experienced Web Developer in Python .</a></h3>
					<div class="postcard__subtitle small">
						<time datetime="2020-05-25 12:00:00">
							<i class="fas fa-calendar-alt mr-2"></i>Mon, May 26th 2023
						</time>
					</div>
					<div class="postcard__bar"></div>
					<div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim,!</div>
					<ul class="postcard__tagbox">
						<li class="tag__item"><i class="fas fa-tag mr-2"></i>Maroc</li>
						<li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
						<li class="tag__item play green">
							<a href="#"><i class="fas fa-play mr-2"></i>APPLY NOW</a>
						</li>
					</ul>
				</div>
			</article>
		</div>
	</section>
    <tbody>
    <?php
        while($row = mysqli_fetch_assoc($result)){
            $job_id=$row['job_id'];
            $title=$row['title'];
            $description=$row['description'];
            $company=$row['company'];
            $location=$row['location'];
        }
    ?>
    </tbody>
        <?php
 }while{
    echo "<h6 class='text-danger text0-center'></h6>";
 }
}
?>