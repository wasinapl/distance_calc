<template>
  <div id="container">
    <div id="points">
      <div class="point">
        <h2>Punkt A</h2>
        <div class="input">
          Długość:<input type="number" v-model="pointA.longitude" />
        </div>
        <div class="input">
          Szerokość:<input type="number" v-model="pointA.latitude" />
        </div>
      </div>
      <div class="point">
        <h2>Punkt B</h2>
        <div class="input">
          Długość:<input type="number" v-model="pointB.longitude" />
        </div>
        <div class="input">
          Szerokość:<input type="number" v-model="pointB.latitude" />
        </div>
      </div>
    </div>
    <div class="btn" @click="calc">Oblicz</div>
    <div id="result" v-show="result != null">
      {{ Math.round(result) }} km, {{ result * 1000 }} m
    </div>
    <div id="message" v-show="message != null">
      {{ message }}
    </div>
  </div>
</template>

<script>
import { reactive, ref } from "vue";
import DistanceService from "../services/distance.service";

export default {
  name: "Distance",
  setup() {
    const pointA = reactive({ latitude: null, longitude: null });
    const pointB = reactive({ latitude: null, longitude: null });
    const result = ref(null);
    const message = ref(null);

    const calc = () => {
      
      DistanceService.getDistance(pointA, pointB).then((res) => {
        if (res.ok) {
          message.value = null;
          result.value = res.result;
        } else {
          result.value = null;
          message.value = res.message;
        }
      });
    };

    return { pointA, pointB, result, message, calc };
  },
};
</script>

<style scoped>
#container {
  height: 400px;
  width: 800px;
  background-color: #272626;
  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
  border-radius: 6px;
  padding: 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

#points {
  display: flex;
  flex-direction: row;
}

#result {
  width: 100%;
}

.btn {
  position: relative;

  display: block;
  margin: 30px auto;
  padding: 10px;
  cursor: pointer;

  overflow: hidden;

  border-width: 0;
  outline: none;
  border-radius: 2px;
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.6);

  background-color: #2ecc71;
  color: #ecf0f1;

  transition: background-color 0.3s;
}

.btn:hover,
.btn:focus {
  background-color: #27ae60;
}

.point {
  width: 360px;
  display: flex;
  padding: 20px;
  flex-direction: column;
  align-items: flex-start;
}

input[type="number"] {
  height: 30px;
  border-radius: 4px;
  margin: 10px;
  text-align: right;
}
</style>
