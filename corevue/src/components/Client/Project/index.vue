<template>
  <div class="container-fluid vh-100 d-flex flex-column bg-light">

    <!-- Nội dung chính -->
    <div class="row flex-grow-1 p-3">

      <!-- TO-DO LIST -->
      <div v-if="showTodo" class="col-12 col-md-4 h-100 d-flex flex-column mb-3">
        <div class="card shadow-sm rounded-lg flex-grow-1">
          <div class="card-header bg-white d-flex justify-content-between align-items-center rounded-top">
           <strong class="text-primary"><i class="fa-solid fa-thumbtack text-danger"></i> To-Do List</strong>
            <button class="btn btn-sm btn-outline-secondary" @click="showTodo = false">Ẩn</button>
          </div>

          <div class="card-body d-flex flex-column">
            <div class="input-group mb-3">
              <input v-model="newTask" type="text" class="form-control" placeholder="Nhập việc cần làm...">
              <button class="btn btn-success" @click="addTask">Thêm</button>
            </div>

            <draggable v-model="todoTasks" group="tasks" item-key="id" class="flex-grow-1">
              <template #item="{ element }">
                <div class="task-item d-flex justify-content-between align-items-center shadow-sm">
                  <span>{{ element.text }}</span>

                  <div class="dropdown">
                    <button class="btn btn-sm btn-light border" type="button" @click="toggleDropdown(element.id)">
                      ⋮
                    </button>

                    <div v-if="dropdownOpen === element.id" class="dropdown-menu show custom-dropdown">
                      <button class="dropdown-item" @click="assignTask(element)">Giao</button>
                      <button class="dropdown-item" @click="setTime(element)">Thời gian</button>
                      <button class="dropdown-item text-danger" @click="deleteTask(element)">Xóa</button>
                    </div>
                  </div>
                </div>
              </template>
            </draggable>

          </div>
        </div>
      </div>

      <!-- BOARD -->
      <div v-if="showBoard" class="col h-100 d-flex flex-column">
        <div class="card shadow-sm rounded-lg flex-grow-1">
          <div class="card-header bg-white d-flex justify-content-between align-items-center rounded-top">
            <strong class="text-primary"><i class="fa-solid fa-rectangle-list text-warning"></i> Board phân chia công việc</strong>
            <button class="btn btn-sm btn-outline-secondary" @click="showBoard = false">Ẩn</button>
          </div>

          <div class="card-body">
            <div class="row h-100 g-2">

              <!-- CỘT BACKLOG -->
              <div class="col-12 col-md-4 d-flex flex-column">
                <div class="board-column backlog-border">
                  <h6 class="column-title">📥 Chưa làm</h6>
                  <div class="input-group mb-2">
                    <input v-model="newBacklog" type="text" class="form-control" placeholder="Thêm thẻ mới...">
                    <button class="btn btn-outline-primary" @click="addBacklog">+</button>
                  </div>

                  <draggable v-model="backlog" group="tasks" item-key="id" class="flex-grow-1">
                    <template #item="{ element }">
                      <div class="task-item shadow-sm">
                        <span>{{ element.text }}</span>
                        <div class="dropdown">
                          <button class="btn btn-sm btn-light border" @click="toggleDropdown(element.id)">⋮</button>

                          <div v-if="dropdownOpen === element.id" class="dropdown-menu show custom-dropdown">
                            <button class="dropdown-item" @click="assignTask(element)">Giao</button>
                            <button class="dropdown-item" @click="setTime(element)">Thời gian</button>
                            <button class="dropdown-item text-danger" @click="deleteTask(element)">Xóa</button>
                          </div>
                        </div>
                      </div>
                    </template>
                  </draggable>
                </div>
              </div>

              <!-- CỘT ĐANG LÀM -->
              <div class="col-12 col-md-4 d-flex flex-column">
                <div class="board-column doing-border">
                  <h6 class="column-title">⚙️ Đang làm</h6>
                  <div class="input-group mb-2">
                    <input v-model="newDoing" type="text" class="form-control" placeholder="Thêm thẻ mới...">
                    <button class="btn btn-outline-primary" @click="addDoing">+</button>
                  </div>

                  <draggable v-model="doing" group="tasks" item-key="id" class="flex-grow-1">
                    <template #item="{ element }">
                      <div class="task-item shadow-sm">
                        <span>{{ element.text }}</span>
                        <div class="dropdown">
                          <button class="btn btn-sm btn-light border" @click="toggleDropdown(element.id)">⋮</button>

                          <div v-if="dropdownOpen === element.id" class="dropdown-menu show custom-dropdown">
                            <button class="dropdown-item" @click="assignTask(element)">Giao</button>
                            <button class="dropdown-item" @click="setTime(element)">Thời gian</button>
                            <button class="dropdown-item text-danger" @click="deleteTask(element)">Xóa</button>
                          </div>
                        </div>
                      </div>
                    </template>
                  </draggable>
                </div>
              </div>

              <!-- CỘT HOÀN THÀNH -->
              <div class="col-12 col-md-4 d-flex flex-column">
                <div class="board-column done-border">
                  <h6 class="column-title">✅ Hoàn thành</h6>
                  <div class="input-group mb-2">
                    <input v-model="newDone" type="text" class="form-control" placeholder="Thêm thẻ mới...">
                    <button class="btn btn-outline-primary" @click="addDone">+</button>
                  </div>

                  <draggable v-model="done" group="tasks" item-key="id" class="flex-grow-1">
                    <template #item="{ element }">
                      <div class="task-item shadow-sm">
                        <span>{{ element.text }}</span>
                        <div class="dropdown">
                          <button class="btn btn-sm btn-light border" @click="toggleDropdown(element.id)">⋮</button>

                          <div v-if="dropdownOpen === element.id" class="dropdown-menu show custom-dropdown">
                            <button class="dropdown-item" @click="assignTask(element)">Giao</button>
                            <button class="dropdown-item" @click="setTime(element)">Thời gian</button>
                            <button class="dropdown-item text-danger" @click="deleteTask(element)">Xóa</button>
                          </div>
                        </div>
                      </div>
                    </template>
                  </draggable>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- NÚT ĐIỀU KHIỂN -->
    <div class="text-center pb-3">
      <button class="btn btn-warning px-4 me-2 toggle-btn mr-2 text-light" @click="showTodo = !showTodo">
        To-Do List
      </button>
      <button class="btn btn-primary px-4 toggle-btn" @click="showBoard = !showBoard">
        Board
      </button>
    </div>

  </div>
</template>



<script>
import draggable from 'vuedraggable';
export default {
  components: {
    draggable,
  },
  data() {
    return {
      showTodo: true,
      showBoard: true,
      newTask: '',
      newBacklog: '',
      newDoing: '',
      newDone: '',
      dropdownOpen: null,
      todoTasks: [
        { id: 1, text: 'Viết tài liệu dự án' },
        { id: 2, text: 'Kiểm tra lỗi giao diện' },
        { id: 3, text: 'Chuẩn bị báo cáo tuần' },
      ],
      backlog: [
        { id: 4, text: 'Thiết kế database' },
        { id: 5, text: 'Tạo wireframe' },
      ],
      doing: [
        { id: 6, text: 'Phát triển API' },
      ],
      done: [
        { id: 7, text: 'Cài đặt môi trường' },
      ],
    };
  },
  methods: {
    addTask() {
      if (this.newTask.trim()) {
        this.todoTasks.push({ id: Date.now(), text: this.newTask });
        this.newTask = '';
      }
    },
    addBacklog() {
      if (this.newBacklog.trim()) {
        this.backlog.push({ id: Date.now(), text: this.newBacklog });
        this.newBacklog = '';
      }
    },
    addDoing() {
      if (this.newDoing.trim()) {
        this.doing.push({ id: Date.now(), text: this.newDoing });
        this.newDoing = '';
      }
    },
    addDone() {
      if (this.newDone.trim()) {
        this.done.push({ id: Date.now(), text: this.newDone });
        this.newDone = '';
      }
    },
    assignTask(item) {
      alert(`Assign task: ${item.text}`);
      this.dropdownOpen = null;
    },
    setTime(item) {
      alert(`Set time for: ${item.text}`);
      this.dropdownOpen = null;
    },
    deleteTask(item) {
      this.todoTasks = this.todoTasks.filter(t => t.id !== item.id);
      this.backlog = this.backlog.filter(t => t.id !== item.id);
      this.doing = this.doing.filter(t => t.id !== item.id);
      this.done = this.done.filter(t => t.id !== item.id);
      this.dropdownOpen = null;
    },
    toggleDropdown(id) {
      this.dropdownOpen = this.dropdownOpen === id ? null : id;
    },
  },
};
</script>

<style scoped>
.dropdown-menu {
  z-index: 1050;
}
.board-column {
  background: #ffffff;
  border-radius: 12px;
  padding: 12px;
  height: 100%;
  border: 2px solid transparent;
}

.backlog-border { border-color: #d0d7ff; }
.doing-border { border-color: #ffe5a3; }
.done-border { border-color: #b7f7c2; }

.column-title {
  font-weight: bold;
  text-align: center;
  margin-bottom: 10px;
}

.task-item {
  background: white;
  padding: 10px 12px;
  border-radius: 8px;
  border-left: 4px solid #007bff;
  margin-bottom: 10px;
  display: flex;
  justify-content: space-between;
  transition: 0.2s;
  cursor: grab;
}

.task-item:hover {
  background: #f8f9fa;
  transform: scale(1.02);
}

.custom-dropdown {
  box-shadow: 0 4px 10px rgba(0,0,0,0.15);
  border-radius: 8px;
}

.toggle-btn {
  border-radius: 12px;
  font-weight: bold;
}

</style>

