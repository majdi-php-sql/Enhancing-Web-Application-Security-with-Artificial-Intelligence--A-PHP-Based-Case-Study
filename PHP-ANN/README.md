# Cyberattack Detection ANN Model

## Author: Majdi M. S. Awad

### Introduction

This repository contains an Artificial Neural Network (ANN) model designed to detect cyberattacks. The model is trained using a dataset of network traffic features and is capable of classifying whether traffic is benign or malicious.

### Requirements

- Python 3.x
- Keras
- TensorFlow
- scikit-learn
- PHP 7.x or higher

### Step-by-Step Guide to Using the Model

1. **Download the Model:**

   Clone the repository and download the `saved_model.h5` file to your local machine.

2. **Set Up Python Environment:**

   Ensure you have Python 3.x installed with the necessary libraries. Install the required libraries using:

   ```bash
   pip install numpy pandas scikit-learn keras tensorflow

Integrate with PHP:

Use the following PHP code snippet to call the Python script:

<?php
// Executing the Python script from PHP
$output = shell_exec('python3 ann.py');
echo $output;
?>

    Test the Model:

    After setting up the PHP and Python environments, run your web application and check the model's output for various network traffic inputs.

    Deploy the Application:

    Once everything is tested, deploy your web application on your desired hosting service with PHP and Python support.

Conclusion

By following the steps above, you can integrate an advanced ANN model into your web application to enhance its security by detecting potential cyberattacks.
License

This project is licensed under the MIT License


By following this guide, you should be able to develop, train, and integrate an ANN model for cyberattack detection into a web application using PHP and Python.

