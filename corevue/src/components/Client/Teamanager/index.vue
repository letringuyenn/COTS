<template>
  <div class="team-management container-fluid">
    <!-- 1. Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2 class="page-title fw-bold text-dark mb-1">Team</h2>
        <p class="text-muted small mb-0">
          Manage team members and their contributions
        </p>
      </div>
      <button
        class="btn btn-primary d-flex align-items-center gap-2 px-3"
        @click="openModal"
      >
        <i class="fas fa-plus"></i> Invite Member
      </button>
    </div>

    <!-- 2. Stats Cards Section -->
    <div class="row g-3 mb-4">
      <!-- Card 1: Total Members -->
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <div
            class="card-body d-flex justify-content-between align-items-center"
          >
            <div>
              <div class="text-muted small mb-1">Total Members</div>
              <div class="h3 fw-bold mb-0">{{ members.length }}</div>
            </div>
            <div class="icon-box bg-primary-subtle text-primary rounded-3 p-3">
              <i class="fas fa-users fa-lg"></i>
            </div>
          </div>
        </div>
      </div>
      <!-- Card 2: Active Projects -->
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <div
            class="card-body d-flex justify-content-between align-items-center"
          >
            <div>
              <div class="text-muted small mb-1">Active Projects</div>
              <div class="h3 fw-bold mb-0">12</div>
              <!-- Số liệu giả định hoặc lấy từ API khác -->
            </div>
            <div class="icon-box bg-success-subtle text-success rounded-3 p-3">
              <i class="fas fa-wave-square fa-lg"></i>
            </div>
          </div>
        </div>
      </div>
      <!-- Card 3: Total Tasks -->
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <div
            class="card-body d-flex justify-content-between align-items-center"
          >
            <div>
              <div class="text-muted small mb-1">Total Tasks</div>
              <div class="h3 fw-bold mb-0">450</div>
            </div>
            <div class="icon-box bg-warning-subtle text-warning rounded-3 p-3">
              <i class="fas fa-shield-alt fa-lg"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 3. Search & Filter Section -->
    <div class="card border-0 shadow-sm mb-4">
      <div class="card-body p-2">
        <div class="input-group bg-light rounded px-2">
          <span class="input-group-text bg-transparent border-0 text-muted">
            <i class="fas fa-search"></i>
          </span>
          <input
            type="text"
            class="form-control bg-transparent border-0 shadow-none"
            placeholder="Search team members..."
            v-model="searchQuery"
          />
        </div>
      </div>
    </div>

    <!-- 4. Members Table Section -->
    <div class="card border-0 shadow-sm">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead class="bg-light">
              <tr>
                <th class="ps-4 py-3 text-muted small text-uppercase border-0">
                  Name
                </th>
                <th class="py-3 text-muted small text-uppercase border-0">
                  Email
                </th>
                <th class="py-3 text-muted small text-uppercase border-0">
                  Role
                </th>
                <th
                  class="pe-4 py-3 text-end text-muted small text-uppercase border-0"
                >
                  Actions
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-if="isLoading">
                <td colspan="4" class="text-center py-4 text-muted">
                  Loading data...
                </td>
              </tr>
              <tr v-else v-for="member in filteredMembers" :key="member.id">
                <td class="ps-4 py-3">
                  <div class="d-flex align-items-center">
                    <div
                      class="avatar-circle me-3"
                      :style="{ backgroundColor: getRandomColor(member.name) }"
                    >
                      {{ getInitials(member.name) }}
                    </div>
                    <div class="fw-bold text-dark">{{ member.name }}</div>
                  </div>
                </td>
                <td class="py-3 text-muted">{{ member.email }}</td>
                <td class="py-3">
                  <span
                    class="badge rounded-pill fw-normal px-3 py-2"
                    :class="roleClass(member.role)"
                  >
                    {{ member.role }}
                  </span>
                </td>
                <td class="pe-4 py-3 text-end">
                  <button
                    class="btn btn-sm btn-light text-danger"
                    @click="removeMember(member.id)"
                    title="Remove"
                  >
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </td>
              </tr>
              <!-- Empty State -->
              <tr v-if="!isLoading && filteredMembers.length === 0">
                <td colspan="4" class="text-center py-5 text-muted">
                  No members found.
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- 5. Modal Invite Member -->
    <div
      v-if="showModal"
      class="modal-backdrop-custom d-flex justify-content-center align-items-center"
    >
      <div class="card shadow-lg border-0" style="width: 450px; max-width: 90%">
        <div
          class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center"
        >
          <h5 class="mb-0 fw-bold">Invite New Member</h5>
          <button type="button" class="btn-close" @click="closeModal"></button>
        </div>
        <div class="card-body p-4">
          <form @submit.prevent="submitMember">
            <div class="mb-3">
              <label class="form-label small fw-bold text-muted"
                >Full Name</label
              >
              <input
                v-model="newMember.name"
                type="text"
                class="form-control"
                placeholder="e.g. John Doe"
                required
              />
            </div>
            <div class="mb-3">
              <label class="form-label small fw-bold text-muted"
                >Email Address</label
              >
              <input
                v-model="newMember.email"
                type="email"
                class="form-control"
                placeholder="name@company.com"
                required
              />
            </div>
            <div class="mb-4">
              <label class="form-label small fw-bold text-muted">Role</label>
              <select v-model="newMember.role" class="form-select">
                <option value="Member">Member</option>
                <option value="Admin">Admin</option>
                <option value="Viewer">Viewer</option>
              </select>
            </div>
            <div class="d-grid">
              <button
                type="submit"
                class="btn btn-primary"
                :disabled="isSubmitting"
              >
                {{ isSubmitting ? "Sending Invite..." : "Send Invite" }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "TeamManagement",
  data() {
    return {
      members: [],
      searchQuery: "",
      isLoading: false,
      isSubmitting: false,
      showModal: false,
      newMember: {
        name: "",
        email: "",
        role: "Member",
      },
    };
  },
  computed: {
    filteredMembers() {
      if (!this.searchQuery) return this.members;
      const query = this.searchQuery.toLowerCase();
      return this.members.filter(
        (m) =>
          m.name.toLowerCase().includes(query) ||
          m.email.toLowerCase().includes(query)
      );
    },
  },
  mounted() {
    this.fetchMembers();
  },
  methods: {
    // --- API Calls ---
    async fetchMembers() {
      this.isLoading = true;
      try {
        const response = await api.getMembers();
        // Hỗ trợ cả 2 kiểu response: mảng trực tiếp hoặc { data: [...] }
        const body = response && response.data ? response.data : null;
        if (Array.isArray(body)) {
          this.members = body;
        } else if (body && Array.isArray(body.data)) {
          this.members = body.data;
        } else {
          this.members = [];
        }
      } catch (error) {
        console.error("Error fetching members:", error);
        // Fallback data nếu API lỗi (để demo UI không bị trắng)
        this.members = [
          {
            id: 1,
            name: "Trí Nguyên Lê",
            email: "nguyenle170824@gmail.com",
            role: "Admin",
          },
        ];
      } finally {
        this.isLoading = false;
      }
    },

    async submitMember() {
      this.isSubmitting = true;
      try {
        const payload = { ...this.newMember };
        // Gọi API thêm thành viên
        const response = await api.addMember(payload);

        // Cập nhật danh sách (thêm vào đầu hoặc reload)
        // Hỗ trợ backend trả về item trực tiếp hoặc { data: item }
        let createdMember = null;
        if (response && response.data) {
          if (Array.isArray(response.data)) {
            // unlikely, but if backend returned array, pick last item
            createdMember = response.data[response.data.length - 1];
          } else if (response.data && response.data.id) {
            createdMember = response.data;
          } else if (response.data && response.data.data) {
            createdMember = response.data.data;
          }
        }
        if (!createdMember) createdMember = { ...payload, id: Date.now() };
        this.members.push(createdMember);

        this.closeModal();
      } catch (error) {
        console.error("Error adding member:", error);
        alert("Failed to add member. Please try again.");
      } finally {
        this.isSubmitting = false;
      }
    },

    async removeMember(id) {
      if (!confirm("Are you sure you want to remove this member?")) return;

      try {
        await api.deleteMember(id);
        this.members = this.members.filter((m) => m.id !== id);
      } catch (error) {
        console.error("Error deleting member:", error);
        alert("Failed to delete member.");
      }
    },

    // --- UI Helpers ---
    openModal() {
      this.showModal = true;
    },
    closeModal() {
      this.showModal = false;
      this.newMember = { name: "", email: "", role: "Member" };
    },
    getInitials(name) {
      if (!name) return "U";
      return name
        .split(" ")
        .map((n) => n[0])
        .join("")
        .substring(0, 2)
        .toUpperCase();
    },
    getRandomColor(name) {
      // Tạo màu cố định dựa trên tên để không bị đổi mỗi lần render
      const colors = [
        "#6366f1",
        "#8b5cf6",
        "#ec4899",
        "#f43f5e",
        "#f97316",
        "#eab308",
        "#22c55e",
        "#06b6d4",
        "#3b82f6",
      ];
      let hash = 0;
      for (let i = 0; i < name.length; i++) {
        hash = name.charCodeAt(i) + ((hash << 5) - hash);
      }
      return colors[Math.abs(hash) % colors.length];
    },
    roleClass(role) {
      const map = {
        Admin: "bg-purple-subtle text-purple",
        Member: "bg-light text-dark border",
        Viewer: "bg-light text-muted border",
      };
      return map[role] || "bg-light text-dark";
    },
  },
};
</script>

<style scoped>
/* Custom Styles to match the design */
.team-management {
  padding: 24px;
  background-color: #f9fafb; /* Nền xám rất nhạt giống ảnh */
  min-height: 100%;
}

/* Typography */
.page-title {
  font-family: "Inter", sans-serif;
  letter-spacing: -0.5px;
}

/* Avatar Styling */
.avatar-circle {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 14px;
  font-weight: 600;
}

/* Custom Colors for Badges (Tailwind-like in Bootstrap) */
.bg-purple-subtle {
  background-color: #f3e8ff;
}
.text-purple {
  color: #7e22ce;
}

.bg-primary-subtle {
  background-color: #e0f2fe;
}
.bg-success-subtle {
  background-color: #dcfce7;
}
.bg-warning-subtle {
  background-color: #fef3c7;
}

/* Modal Overlay */
.modal-backdrop-custom {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.4);
  z-index: 1050;
  animation: fadeIn 0.2s ease-out;
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

/* Table Enhancements */
.table th {
  font-weight: 600;
  letter-spacing: 0.5px;
  background-color: #f9fafb;
}
.table td {
  vertical-align: middle;
}
.table-hover tbody tr:hover {
  background-color: #ffffff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
}
</style>
