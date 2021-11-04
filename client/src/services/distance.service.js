import axios from "axios";

const API = "http://localhost:3000/server/index.php";

class DistanceService {
  getDistance(pointA, pointB) {
    const params = new URLSearchParams();
    params.append("points[a][longitude]", pointA.longitude);
    params.append("points[a][latitude]", pointA.latitude);
    params.append("points[b][longitude]", pointB.longitude);
    params.append("points[b][latitude]", pointB.latitude);
    
    const config = {
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
    };
    return axios
      .post(API, params, config)
      .then((res) => {
        return res.data;
      })
      .catch((err) => {
        return err.response.data;
      });
  }
}

export default new DistanceService();
