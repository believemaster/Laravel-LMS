<template>
  <div class="container">
    <h1 class="text-center">
      <button class="btn btn-primary" @click="createNewLesson">Create New Lesson</button>
    </h1>
    <ul class="list-group">
      <li class="list-group-item" v-for="lesson in lessons">{{ lesson.title }}</li>
    </ul>
    <create-lesson></create-lesson>
  </div>
</template>

<script>
import CreateLesson from "./children/CreateLesson";

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
  },
};
</script>
