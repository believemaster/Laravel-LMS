<template>
  <div class="container">
    <h1 class="text-center">
      <button class="btn btn-primary" @click="createNewLesson">Create New Lesson</button>
    </h1>
    <ul class="list-group">
      <li class="list-group-item d-flex justify-content-between" v-for="lesson in lessons">
        <p>{{ lesson.title }}</p>
        <p>
          <button class="btn btn-primary btn-xs">Edit</button>

          <button class="btn btn-danger btn-xs" @click="deleteLesson(lesson.id)">Delete</button>
        </p>
      </li>
    </ul>
    <create-lesson></create-lesson>
  </div>
</template>

<script>
import CreateLesson from "./children/CreateLesson";
import Axios from "axios";

export default {
  props: ["default_lessons", "series_id"],

  mounted() {
    this.$on("lesson_created", (lesson) => {
      this.lessons.push(lesson);
    });
  },

  components: {
    "create-lesson": CreateLesson,
  },

  data() {
    return {
      lessons: JSON.parse(this.default_lessons),
    };
  },

  computed: {},

  methods: {
    createNewLesson() {
      this.$emit("create_new_lesson", this.series_id);
    },

    deleteLesson(id) {
      if (confirm("Are You Sure?")) {
        Axios.delete(`/admin/${this.series_id}/lessons/${id}`)
          .then((resp) => {
            console.log(resp);
          })
          .catch((resp) => {
            console.log(resp);
          });
      }
    },
  },
};
</script>
