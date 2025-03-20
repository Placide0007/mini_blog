<template>
  <div class="row min-vh-100">

    <div class="col-md-3 bg-white d-none d-md-flex flex-column justify-content-start align-items-stretch sidebar vh-100">
      <div v-if="isLoading" class="d-flex justify-content-center align-items-center flex-grow-1">
        <div class="spinner-border" role="status">
          <span class="sr-only"></span>
        </div>
      </div>
      <div v-else class="d-flex flex-column w-100 overflow-y-auto">
        <div v-for="post in posts" :key="post.id" class="w-100 border p-2 mt-4 shadow-sm">
          <router-link @click="openModal(post)" data-bs-toggle="modal" data-bs-target="#modal_content"
            class="text-dark text-decoration-none">
            <div class="d-flex justify-content-between">
              <button class="btn btn-sm btn-success mb-3">{{ post.user.pseudo }}</button>
              <p class="small"> {{ post.user ? moment(post.user.created_at).format('D MMMM YYYY') : '' }}</p>
            </div>
            <p class="bg-white p-3 rounded"
              style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">{{ post.content
              }}</p>
            <p class="small border-top pt-1">
              {{ post.comments && post.comments.length > 0 ? post.comments.length + ' commentaire' +
                (post.comments.length > 1 ? 's' : '') : '0 commentaire' }}
            </p>
          </router-link>
        </div>
      </div>
    </div>


    <div v-if="posts.length === 0" class="col-md-6 mt-3 d-flex justify-content-center align-items-center bg-white p-3 rounded content">
      <div class="spinner-border" role="status">
        <span class="sr-only"></span>
      </div>
    </div>

    <div v-else class="col-md-6 mt-3 rounded overflow-y-scroll p-md-5 p-3 content bg-main">
      <div v-for="post in posts" :key="post.id">
        <router-link @click="openModal(post)" data-bs-toggle="modal" data-bs-target="#modal_content"
          class="text-decoration-none">
          <div class="card mb-3">
            <div class="card-header px-0 py-0">
              <div class="d-flex justify-content-between p-2">
                <button class="btn btn-dark">{{ post.user ? post.user.pseudo : 'Utilisateur inconnu' }}</button>
                <p class="figure-caption small">
                  {{ post.user ? moment(post.user.created_at).format('D MMMM YYYY, H:mm') : '' }}
                </p>
              </div>
              <p class="bg-white p-3 rounded mx-2 lead"
                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">
                {{ post.content }}
              </p>
            </div>
            <div v-if="post.image" class="card-body">
              <img :src="`/storage/${post.image}`" alt="Image du post" class="img-fluid" />
            </div>
            <div class="card-footer">
              <p class="pt-1">
                {{ post.comments && post.comments.length > 0 ? post.comments.length + ' commentaire' +
                  (post.comments.length > 1 ? 's' : '') : '0 commentaire' }}
              </p>
            </div>
          </div>
        </router-link>
      </div>
    </div>


    <div class="col-md-3 bg-white d-none d-md-flex flex-column justify-content-start align-items-stretch sidebar vh-100">
      <div v-if="isLoading" class="d-flex justify-content-center align-items-center flex-grow-1">
        <div class="spinner-border" role="status">
          <span class="sr-only"></span>
        </div>
      </div>
      <div v-else class="d-flex flex-column w-100 overflow-y-auto">
        <div class="w-100 p-4">
          <h5>Bienvenue sur notre plateforme</h5>
          <p class="text-muted">Nous espérons que vous avez une excellente expérience !</p>
          <hr />
          <h6>Nous suivre</h6>
          <ul class="list-unstyled">
            <li>
              <a href="https://facebook.com" target="_blank" class="text-decoration-none">Facebook</a>
            </li>
            <li>
              <a href="https://twitter.com" target="_blank" class="text-decoration-none">Twitter</a>
            </li>
            <li>
              <a href="https://github.com" target="_blank" class="text-decoration-none">Github</a>
            </li>
          </ul>
        </div>
      </div>
    </div>


    <div class="modal modal-lg fade" id="modal_content" tabindex="-1" aria-labelledby="modal_contentLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button class="modal-title btn btn-dark" id="modal_contentLabel">
              {{ selectedPost?.user ? selectedPost.user.pseudo : 'Utilisateur inconnu' }}
            </button>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p class="lead">{{ selectedPost?.content }}</p>
            <div v-if="selectedPost?.image">
              <img :src="`/storage/${selectedPost.image}`" alt="Image du post" class="img-fluid" />
            </div>
            <div style="height:180px;" v-if="selectedPost?.comments && selectedPost.comments.length > 0"
              class="mt-3 border overflow-y-scroll">
              <div>
                <div class="p-2" v-for="(comment, index) in displayedComments" :key="comment.id">
                  <button class="btn btn-sm btn-dark mb-2">{{ comment.user.pseudo }}</button>
                  <div class="bg-light p-2">
                    <p class="lead">{{ comment.comment }}</p>
                    <p class="small">{{ moment(comment.created_at).format('D MMMM YYYY') }}</p>
                  </div>
                </div>
              </div>
              <div v-if="selectedPost.comments.length > 3" class="text-center mt-2">
                <button @click="toggleComments" class="btn btn-link p-0">
                  {{ areAllCommentsVisible ? 'Voir moins' : 'Voir plus' }}
                </button>
              </div>
            </div>
            <div class="mt-3 border rounded">
              <textarea style="border:none;" v-model="newComment" class="form-control"
                placeholder="Ajouter un commentaire" rows="2"></textarea>
              <button style="float:right;" @click="addComment" class="btn btn-secondary mt-2">Commenter</button>
            </div>
            <div v-if="commentError" class="text-danger mt-2">{{ commentError }}</div>
          </div>
        </div>
      </div>
    </div>

    <FooterVue />
  </div>
</template>

<script setup>
  import axios from "axios";
  import { onMounted, ref } from "vue";
  import { useRouter } from "vue-router";
  import FooterVue from "../layout/Footer.vue";
  import moment from "moment";

  const router = useRouter();
  const posts = ref([]);
  const selectedPost = ref(null);
  const newComment = ref("");
  const commentError = ref("");
  const displayedComments = ref([]);
  const commentsToShow = ref(3);
  const areAllCommentsVisible = ref(false);
  const isLoading = ref(true);

  const fetchPosts = () => {
    const token = localStorage.getItem("auth_token");
    const config = token ? { headers: { Authorization: `Bearer ${token}` } } : router.push('/login');

    axios.get("http://127.0.0.1:8000/api/posts", config)
      .then((response) => {
        posts.value = response.data.map(post => {
          return { ...post, user: post.user || { pseudo: 'Utilisateur inconnu' }, comments: post.comments || [] };
        });
        isLoading.value = false;
      })
      .catch(() => {
        isLoading.value = false;
      });
  };

  const openModal = (post) => {
    selectedPost.value = post;
    newComment.value = "";
    commentError.value = "";
    displayedComments.value = post.comments.slice(0, commentsToShow.value);
  };

  const addComment = () => {
    if (!newComment.value.trim()) {
      commentError.value = "Veuillez entrer un commentaire.";
      return;
    }

    const token = localStorage.getItem("auth_token");
    if (!token) {
      router.push("/login");
      return;
    }

    const postId = selectedPost.value.id;
    if (!postId) {
      commentError.value = "Erreur: Aucun ID de post trouvé.";
      return;
    }

    axios.post(`http://127.0.0.1:8000/api/posts/${postId}/comments`, { comment: newComment.value, post_id: postId }, { headers: { Authorization: `Bearer ${token}` } })
      .then((response) => {
        selectedPost.value.comments.unshift(response.data.comment);
        if (areAllCommentsVisible.value) {
          displayedComments.value = selectedPost.value.comments;
        } else {
          displayedComments.value = selectedPost.value.comments.slice(0, commentsToShow.value);
        }

        newComment.value = "";
        commentError.value = "";
      })
      .catch((error) => {
        console.error("Erreur lors de l'ajout du commentaire", error.response?.data);
        commentError.value = error.response?.data.message || "Erreur lors de l'ajout du commentaire.";
      });
  };

  const toggleComments = () => {
    areAllCommentsVisible.value = !areAllCommentsVisible.value;
    if (areAllCommentsVisible.value) {
      displayedComments.value = selectedPost.value.comments;
    } else {
      displayedComments.value = selectedPost.value.comments.slice(0, 3);
    }
  };

  onMounted(() => {
    fetchPosts();
  });
</script>

<style scoped>
  .sidebar {
    background-color: #f8f9fa;
    height: 100vh;
    overflow-y: auto;
  }

  .bg-main{
    background-color:#0B192C;
  }

  .content {
    overflow-y: auto;
    height: 100vh;
  }

  .card {
    border-radius: 0.375rem;
  }

  textarea {
    resize: none;
  }

  .text-center .btn-link {
    font-size: 14px;
    color: #007bff;
    text-decoration: underline;
  }

  .text-center .btn-link:hover {
    color: #0056b3;
  }

  .card-body img,
  .modal-body img {
    width: 100%;
    height: 500px;
    object-fit:cover;
    object-position: center;
  }
</style>
