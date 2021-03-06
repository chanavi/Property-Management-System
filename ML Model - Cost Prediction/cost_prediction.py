from sklearn.metrics import accuracy_score
from sklearn import preprocessing
import numpy as np
import pandas as pd
from sklearn.ensemble import RandomForestRegressor
from sklearn.model_selection import train_test_split
import warnings
import pickle
warnings.filterwarnings("ignore")

data = pd.read_csv(
    "ML Model - Cost Prediction/Cost_Prediction.csv", header=0)
data = np.array(data)

le = preprocessing.LabelEncoder()
data[:, 0] = le.fit_transform(data[:, 0])
print(le.classes_)
data[:, 1] = le.fit_transform(data[:, 1])
print(le.classes_)

X = data[:, 0:-1]
y = data[:, -1]

X_train, X_test, y_train, y_test = train_test_split(
    X, y, test_size=0.3, random_state=0, stratify=X[:, 0])
regr = RandomForestRegressor()
regr.fit(X_train, y_train)

b = regr.predict(X_test)
# print(accuracy_score(y_test, int(b)))
print(y_test)
print(b)

pickle.dump(regr, open('model.pkl', 'wb'))
model = pickle.load(open('model.pkl', 'rb'))
