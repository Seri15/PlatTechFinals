<?php

$file_paths_home = [
    'welcome' => 'content/welcome.txt',
    'heading' => 'content/heading.txt',
    'description' => 'content/description.txt',
];
$filePaths_about = [
    'name' => 'data/name.txt',
    'title' => 'data/title.txt',
    'about' => 'data/about.txt',
    'why' => 'data/why.txt',
    'vision' => 'data/vision.txt',
    'personal_name' => 'data/personal_name.txt',
    'personal_nationality' => 'data/personal_nationality.txt',
    'personal_dob' => 'data/personal_dob.txt',
    'personal_email' => 'data/personal_email.txt',
    'personal_website' => 'data/personal_website.txt',
    'personal_phone' => 'data/personal_phone.txt',
    'personal_hobbies' => 'data/personal_hobbies.txt',
];

if (!is_dir('content')) {
  mkdir('content', 0755, true);
}
if (!is_dir('data')) {
  mkdir('data', 0755, true);
}
$dataFile = 'data.json';
$data = json_decode(file_get_contents($dataFile), true);


$dataFiletwo = 'subdata.json';
$datatwo = json_decode(file_get_contents($dataFiletwo), true);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        
        foreach ($file_paths_home as $key => $path) {
            if (isset($_POST[$key])) {
                file_put_contents($path, $_POST[$key]);
            }
        }
       
       if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        foreach ($filePaths_about as $key => $filePath) {
            if (isset($_POST[$key])) {
                file_put_contents($filePath, $_POST[$key]); 
            }
        }
       }
      
        $data['mainTitle'] = $_POST['mainTitle'];
        $data['mainDescription'] = $_POST['mainDescription'];

       
        $datatwo['subTitle'] = $_POST['subTitle'];
        $datatwo['subDescription'] = $_POST['subDescription'];

        foreach ($data['skills'] as &$skill) {
            $id = $skill['id'];
            if (isset($_POST["title-$id"]) && isset($_POST["description-$id"])) {
                $skill['title'] = $_POST["title-$id"];
                $skill['description'] = $_POST["description-$id"];
            }
        }

        foreach ($datatwo['softskills'] as &$skilltwo) {
          $identity = $skilltwo['identity'];
          if (isset($_POST["subtitle-$identity"]) && isset($_POST["subdescription-$identity"])) {
              $skilltwo['subtitle'] = $_POST["subtitle-$identity"];
              $skilltwo['subdescription'] = $_POST["subdescription-$identity"];
          }
      }
      
    
        
        file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));

        
     file_put_contents($dataFiletwo, json_encode($datatwo, JSON_PRETTY_PRINT));

        echo '<p style="color: green;">Content updated successfully!</p>';
    } catch (Exception $e) {
        echo '<p style="color: red;">Error saving content: ' . $e->getMessage() . '</p>';

    }
}


$welcomeContent = file_exists('content/welcome.txt') ? file_get_contents('content/welcome.txt') : '~WELCOME';
$headingContent = file_exists('content/heading.txt') ? file_get_contents('content/heading.txt') : "I'm Charlie De Vera";
$descriptionContent = file_exists('content/description.txt') ? file_get_contents('content/description.txt') : '';

$aboutTitle = file_exists('data/about_title.txt') ? file_get_contents('data/about_title.txt') : 'About Me';
$aboutContent = file_exists('data/about_content.txt') ? file_get_contents('data/about_content.txt') : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Pane</title>
  <link rel="stylesheet" href="admin.css">
</head>
<body>
  <h1>Admin Panel - Edit All Content</h1>
  <form method="POST" style="margin-bottom: 2rem; border: 1px solid #ccc; padding: 1rem;">

  
    <h2>Home Page Content</h2>
    <div>
      <label for="welcome">Welcome Text:</label><br>
      <textarea id="welcome" name="welcome" rows="3" cols="50"><?= htmlspecialchars($welcomeContent) ?></textarea>
    </div>
    <div>
      <label for="heading">Heading Text:</label><br>
      <textarea id="heading" name="heading" rows="2" cols="50"><?= htmlspecialchars($headingContent) ?></textarea>
    </div>
    <div>
      <label for="description">Description Text:</label><br>
      <textarea id="description" name="description" rows="3" cols="50"><?= htmlspecialchars($descriptionContent) ?></textarea>
    </div>
    <br>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <h1>Admin Panel</h1>
    <form method="POST" action="admin.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= file_exists($filePaths_about['name']) ? htmlspecialchars(file_get_contents($filePaths_about['name'])) : '' ?>" ><br>

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?= file_exists($filePaths_about['title']) ? htmlspecialchars(file_get_contents($filePaths_about['title'])) : '' ?>" ><br>

        <label for="about">About:</label>
        <textarea id="about" name="about" required><?= file_exists($filePaths_about['about']) ? htmlspecialchars(file_get_contents($filePaths_about['about'])) : '' ?></textarea><br>

        <label for="why">Why Me:</label>
        <textarea id="why" name="why" required><?= file_exists($filePaths_about['why']) ? htmlspecialchars(file_get_contents($filePaths_about['why'])) : '' ?></textarea><br>

        <label for="vision">Vision:</label>
        <textarea id="vision" name="vision" required><?= file_exists($filePaths_about['vision']) ? htmlspecialchars(file_get_contents($filePaths_about['vision'])) : '' ?></textarea><br>

        <h3>Personal Info</h3>
        <label for="personal_name">Personal Name:</label>
        <input type="text" id="personal_name" name="personal_name" value="<?= file_exists($filePaths_about['personal_name']) ? htmlspecialchars(file_get_contents($filePaths_about['personal_name'])) : '' ?>" ><br>

        <label for="personal_nationality">Nationality:</label>
        <input type="text" id="personal_nationality" name="personal_nationality" value="<?= file_exists($filePaths_about['personal_nationality']) ? htmlspecialchars(file_get_contents($filePaths_about['personal_nationality'])) : '' ?>" ><br>

        <label for="personal_dob">Date of Birth:</label>
        <input type="text" id="personal_dob" name="personal_dob" value="<?= file_exists($filePaths_about['personal_dob']) ? htmlspecialchars(file_get_contents($filePaths_about['personal_dob'])) : '' ?>" ><br>

        <label for="personal_email">Email:</label>
        <input type="email" id="personal_email" name="personal_email" value="<?= file_exists($filePaths_about['personal_email']) ? htmlspecialchars(file_get_contents($filePaths_about['personal_email'])) : '' ?>" ><br>

        <label for="personal_website">Website:</label>
        <input type="text" id="personal_website" name="personal_website" value="<?= file_exists($filePaths_about['personal_website']) ? htmlspecialchars(file_get_contents($filePaths_about['personal_website'])) : '' ?>" ><br>

        <label for="personal_phone">Phone:</label>
        <input type="text" id="personal_phone" name="personal_phone" value="<?= file_exists($filePaths_about['personal_phone']) ? htmlspecialchars(file_get_contents($filePaths_about['personal_phone'])) : '' ?>" ><br>

        <label for="personal_hobbies">Hobbies:</label>
        <input type="text" id="personal_hobbies" name="personal_hobbies" value="<?= file_exists($filePaths_about['personal_hobbies']) ? htmlspecialchars(file_get_contents($filePaths_about['personal_hobbies'])) : '' ?>" ><br>

        <br>
 
    <h2>Technical Skills</h2>
    <div>
      <label for="mainTitle">Main Title:</label><br>
      <input type="text" id="mainTitle" name="mainTitle" value="<?= htmlspecialchars($data['mainTitle']) ?>" ><br><br>
      <label for="mainDescription">Main Description:</label><br>
      <textarea id="mainDescription" name="mainDescription" rows="4" cols="50" required><?= htmlspecialchars($data['mainDescription']) ?></textarea><br><br>
    </div>
    <?php foreach ($data['skills'] as $skill): ?>
      <div style="margin-bottom: 1rem; border: 1px solid #ddd; padding: 1rem;">
        <label for="subtitle-<?= $skill['id'] ?>">Skill Title:</label><br>
        <input type="text" id="title-<?= $skill['id'] ?>" name="title-<?= $skill['id'] ?>" value="<?= htmlspecialchars($skill['title']) ?>" ><br><br>
        <label for="description-<?= $skill['id'] ?>">Description:</label><br>
        <textarea id="description-<?= $skill['id'] ?>" name="description-<?= $skill['id'] ?>" rows="4" cols="50"> <?= htmlspecialchars($skill['description']) ?></textarea>
      </div>
    <?php endforeach; ?>

     <h2>Soft Skills</h2>
     <div>
       <label for="subTitle">Main Title:</label><br>
       <input type="text" id="subTitle" name="subTitle" value="<?= htmlspecialchars($datatwo['subTitle']) ?>" >
       <label for="subDescription">Main Description:</label><br>
       <textarea id="subDescription" name="subDescription" rows="4" cols="50"><?= htmlspecialchars($datatwo['subDescription']) ?></textarea><br><br>
    </div>
    <?php foreach ($datatwo['softskills'] as $skilltwo): ?>
      <div style="margin-bottom: 1rem; border: 1px solid #ddd; padding: 1rem;">
       <label for="subtitle-<?= $skilltwo['identity'] ?>">Skill Title:</label><br>
       <input type="text" id="subtitle-<?= $skilltwo['identity'] ?>" name="subtitle-<?= $skilltwo['identity'] ?>" value="<?= htmlspecialchars($skilltwo['subtitle']) ?>" >
       <label for="subdescription-<?= $skilltwo['identity'] ?>">Description:</label><br>
       <textarea identity="subdescription-<?= $skilltwo['identity'] ?>" name="subdescription-<?= $skilltwo['identity'] ?>" rows="4" cols="50"> <?= htmlspecialchars($skilltwo['subdescription']) ?></textarea>
    </div>
    <?php endforeach; ?>

    <button type="submit" style="display: block; margin: 0 auto;">Save Changes</button>
  </form>
</body>
</html>
