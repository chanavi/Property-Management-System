from flask import Flask, request, url_for, redirect, render_template
import pickle
import numpy as np
import math

app = Flask(__name__)

model = pickle.load(open('model.pkl', 'rb'))


@app.route('/')
def hello_world():
    return render_template("cost_prediction.html")


@app.route('/predict', methods=['POST', 'GET'])
def predict():
    int_features = [int(x) for x in request.form.values()]
    final = [np.array(int_features)]
    print(int_features)
    print(final)
    output = model.predict(final)

    # Rounding up
    output = int(math.ceil(output/100000)*100000)

    return render_template('cost_prediction.html', pred='Estimated Cost : INR {}'.format((output)))


if __name__ == '__main__':
    app.run(debug=True)
