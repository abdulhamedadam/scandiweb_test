const app = Vue.createApp({
    
     mounted() {
    // Retrieve error_message and redirect_message from URL query parameters
    const params = new URLSearchParams(window.location.search);
    this.errorMessage = params.get('error_message') || '';
    this.redirectMessage = params.get('redirect_message') || '';
    },
  data() {
    return {
      productType: '',
      sku: '',
      errorMessage: '',
      redirectMessage: '',
      name: '',
      price: '',
      size: '',
      weight: '',
      height: '',
      width: '',
      length: '',
      isAnyCheckboxChecked: false,
      isButtonDisabled: true,
      checkedIds: [],
    };
  },
  methods: {
    handleClick() {
      window.location.href = 'show-product.php';
    },
    handleSubmit() {
     if (this.isButtonDisabled) {
        // Button is disabled, do not submit the form
        return;
      }
    },
  },
  watch: {
    checkedIds: {
      handler() {
        this.isAnyCheckboxChecked = this.checkedIds.length > 0;
      },
      deep: true,
    },
  },
});

app.mount('#app');
