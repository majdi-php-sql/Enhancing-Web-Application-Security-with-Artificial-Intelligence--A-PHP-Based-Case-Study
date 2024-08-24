import numpy as np
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import StandardScaler
from keras.models import Sequential
from keras.layers import Dense

# Step 1: Load the dataset
# I loaded the dataset using pandas to perform data preprocessing
data = pd.read_csv('Cyberattacks_Detection.csv')

# Step 2: Data Preprocessing
# I handled missing values by removing or imputing them
data = data.dropna()

# Selecting features and target variable
X = data.iloc[:, :-1].values  # Features
y = data.iloc[:, -1].values   # Target variable

# Normalizing the data
# I used StandardScaler to normalize the data to have a mean of 0 and standard deviation of 1
scaler = StandardScaler()
X = scaler.fit_transform(X)

# Splitting the dataset into training and testing sets
# I split the dataset into 80% training and 20% testing to evaluate the model's performance
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Step 3: Building the ANN model
# I used the Sequential API from Keras to define the ANN architecture
model = Sequential()

# Adding input and first hidden layer
model.add(Dense(units=128, activation='relu', input_dim=X_train.shape[1]))

# Adding second hidden layer
model.add(Dense(units=64, activation='relu'))

# Adding third hidden layer
model.add(Dense(units=32, activation='relu'))

# Adding the output layer
# I used sigmoid activation for binary classification (attack or no attack)
model.add(Dense(units=1, activation='sigmoid'))

# Compiling the model
# I used binary_crossentropy as the loss function for binary classification and adam optimizer
model.compile(optimizer='adam', loss='binary_crossentropy', metrics=['accuracy'])

# Step 4: Training the model
# I trained the model using the training data and validated it on the test data
model.fit(X_train, y_train, epochs=100, batch_size=10, validation_data=(X_test, y_test))

# Step 5: Saving the model
# I saved the trained model to an .h5 file for later use in PHP integration
model.save('saved_model.h5')
